<?php

namespace Tests\Feature;

use App\Jobs\ProcessStripeWebhook;
use App\Models\Access;
use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_checkout_session_and_redirects_to_mock_payment(): void
    {
        // Arrange
        $service = Service::factory()->price(5000)->create();

        // Act
        $response = $this->post(route('payment.create'), [
            'service_id' => $service->id,
            'email' => 'buyer@example.com',
        ]);

        // Assert: Purchase created
        $this->assertEquals(1, Purchase::count());
        $purchase = Purchase::first();

        $this->assertEquals($service->id, $purchase->service_id);
        $this->assertEquals('buyer@example.com', $purchase->email);
        $this->assertEquals(5000, $purchase->amount);
        $this->assertEquals('EUR', $purchase->currency);
        $this->assertEquals('pending', $purchase->status);
        $this->assertEquals('mock', $purchase->payment_provider);

        // Assert: Redirects to mock checkout
        $response->assertRedirect(route('payment.mock.checkout', $purchase));
    }

    /** @test */
    public function it_completes_mock_payment_and_grants_access(): void
    {
        Queue::fake();

        // Arrange: Create pending purchase
        $service = Service::factory()->create([
            'access_duration_days' => 30,
        ]);
        $purchase = Purchase::factory()->create([
            'service_id' => $service->id,
            'status' => 'pending',
            'email' => 'buyer@example.com',
        ]);

        // Act: Complete mock payment
        $response = $this->post(route('payment.mock.pay', $purchase));

        // Assert: Purchase marked as paid
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);

        // Assert: Access granted
        $this->assertEquals(1, Access::count());
        $access = Access::first();

        $this->assertEquals($service->id, $access->service_id);
        $this->assertEquals($purchase->id, $access->purchase_id);
        $this->assertTrue($access->is_active);
        $this->assertNotNull($access->access_token);
        $this->assertEquals(64, strlen($access->access_token));
        $this->assertNotNull($access->starts_at);
        $this->assertNotNull($access->expires_at);

        // Verify expiration is ~30 days from now
        $expectedExpiration = now()->addDays(30);
        $this->assertTrue($access->expires_at->between(
            $expectedExpiration->copy()->subMinute(),
            $expectedExpiration->copy()->addMinute()
        ));

        // Assert: Redirects to service page with token
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString($service->slug, $redirectUrl);
        $this->assertStringContainsString('token=' . $access->access_token, $redirectUrl);
    }

    /** @test */
    public function it_handles_webhook_payment_intent_succeeded(): void
    {
        Queue::fake();

        // Arrange: Create pending purchase
        $service = Service::factory()->create();
        $purchase = Purchase::factory()->create([
            'service_id' => $service->id,
            'payment_id' => 'pi_test_123',
            'status' => 'pending',
        ]);

        // Simulate webhook event
        $event = [
            'id' => 'evt_test_123',
            'type' => 'payment_intent.succeeded',
            'data' => [
                'object' => [
                    'id' => 'pi_test_123',
                    'status' => 'succeeded',
                ],
            ],
        ];

        // Act: Process webhook through job
        $job = new ProcessStripeWebhook($event);
        $job->handle();

        // Assert: Purchase marked as paid
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);

        // Assert: Access granted
        $this->assertEquals(1, Access::count());
    }

    /** @test */
    public function it_handles_webhook_payment_intent_failed(): void
    {
        Queue::fake();

        // Arrange: Create pending purchase
        $purchase = Purchase::factory()->create([
            'payment_id' => 'pi_test_failed',
            'status' => 'pending',
        ]);

        // Simulate webhook event
        $event = [
            'id' => 'evt_test_failed',
            'type' => 'payment_intent.payment_failed',
            'data' => [
                'object' => [
                    'id' => 'pi_test_failed',
                    'status' => 'failed',
                    'last_payment_error' => [
                        'message' => 'Card declined',
                    ],
                ],
            ],
        ];

        // Act: Process webhook through job
        $job = new ProcessStripeWebhook($event);
        $job->handle();

        // Assert: Purchase marked as failed
        $purchase->refresh();
        $this->assertEquals('failed', $purchase->status);

        // Assert: No access granted
        $this->assertEquals(0, Access::count());
    }

    /** @test */
    public function webhook_is_idempotent_and_does_not_duplicate_access(): void
    {
        Queue::fake();

        // Arrange: Create pending purchase
        $service = Service::factory()->create();
        $purchase = Purchase::factory()->create([
            'service_id' => $service->id,
            'payment_id' => 'pi_test_idempotent',
            'status' => 'pending',
        ]);

        $event = [
            'id' => 'evt_idempotent',
            'type' => 'payment_intent.succeeded',
            'data' => [
                'object' => [
                    'id' => 'pi_test_idempotent',
                    'status' => 'succeeded',
                ],
            ],
        ];

        // Act: Process webhook twice
        $job1 = new ProcessStripeWebhook($event);
        $job1->handle();

        $job2 = new ProcessStripeWebhook($event);
        $job2->handle();

        // Assert: Purchase marked as paid
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);

        // Assert: Only ONE access granted (not duplicated)
        $this->assertEquals(1, Access::count());
    }

    /** @test */
    public function it_throttles_payment_creation_requests(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act: Make 11 requests (throttle limit is 10/min)
        $responses = [];
        for ($i = 0; $i < 11; $i++) {
            $responses[] = $this->post(route('payment.create'), [
                'service_id' => $service->id,
                'email' => "user{$i}@example.com",
            ]);
        }

        // Assert: First 10 should succeed, 11th should be throttled
        foreach (array_slice($responses, 0, 10) as $response) {
            $this->assertTrue(
                $response->isRedirect() || $response->status() === 302,
                'First 10 requests should succeed'
            );
        }

        // 11th request should be throttled
        $lastResponse = $responses[10];
        $this->assertEquals(429, $lastResponse->status(), '11th request should be throttled');
    }

    /** @test */
    public function mock_payment_only_available_when_mock_enabled(): void
    {
        // This test verifies that mock routes are accessible
        // In production, this would be protected by middleware

        // Arrange
        $purchase = Purchase::factory()->create([
            'payment_provider' => 'mock',
            'status' => 'pending',
        ]);

        // Act
        $response = $this->get(route('payment.mock.checkout', $purchase));

        // Assert: Should be accessible in test environment
        $response->assertStatus(200);
        $response->assertSee('Тестовая оплата');
    }

    /** @test */
    public function payment_creates_activity_log_entry(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act
        $this->post(route('payment.create'), [
            'service_id' => $service->id,
            'email' => 'test@example.com',
        ]);

        // Assert: Activity log should be created
        $this->assertDatabaseHas('activity_logs', [
            'event_type' => 'payment_started',
        ]);
    }

    /** @test */
    public function successful_payment_redirects_to_service_with_token(): void
    {
        Queue::fake();

        // Arrange
        $service = Service::factory()->create([
            'slug' => 'my-service',
        ]);
        $purchase = Purchase::factory()->create([
            'service_id' => $service->id,
            'status' => 'pending',
        ]);

        // Act
        $response = $this->post(route('payment.mock.pay', $purchase));

        // Assert
        $access = Access::first();
        $expectedUrl = route('services.show', [
            'slug' => 'my-service',
            'token' => $access->access_token,
        ]);

        $response->assertRedirect($expectedUrl);
    }

    /** @test */
    public function webhook_idempotency_cache_prevents_duplicate_processing(): void
    {
        Queue::fake();

        // Arrange: Simulate webhook
        $eventId = 'evt_cache_test_123';
        $cacheKey = "webhook_processed_{$eventId}";

        // Pre-populate cache (simulating already processed webhook)
        Cache::put($cacheKey, true, now()->addHours(24));

        $purchase = Purchase::factory()->create([
            'payment_id' => 'pi_test_cache',
            'status' => 'pending',
        ]);

        $event = [
            'id' => $eventId,
            'type' => 'payment_intent.succeeded',
            'data' => [
                'object' => [
                    'id' => 'pi_test_cache',
                    'status' => 'succeeded',
                ],
            ],
        ];

        // Act: Try to process webhook
        $job = new ProcessStripeWebhook($event);
        $job->handle();

        // Assert: Purchase should still be pending (not processed again)
        $purchase->refresh();
        $this->assertEquals('pending', $purchase->status);
        $this->assertEquals(0, Access::count());
    }
}
