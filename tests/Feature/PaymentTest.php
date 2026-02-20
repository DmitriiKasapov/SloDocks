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

        // Act — email is no longer collected here, it comes from Stripe/mock later
        $response = $this->post(route('payment.create'), [
            'service_id' => $service->id,
        ]);

        // Assert: Purchase created (email is null at this stage)
        $this->assertEquals(1, Purchase::count());
        $purchase = Purchase::first();

        $this->assertEquals($service->id, $purchase->service_id);
        $this->assertNull($purchase->email); // set later via webhook/mock pay
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
        ]);

        // Act: Complete mock payment — email is collected on the mock checkout form
        $response = $this->post(route('payment.mock.pay', $purchase), [
            'email' => 'buyer@example.com',
        ]);

        // Assert: Purchase marked as paid with email
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);
        $this->assertEquals('buyer@example.com', $purchase->email);

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

        // Assert: Redirects to success page with token
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString('payment/success', $redirectUrl);
        $this->assertStringContainsString('token=' . $access->access_token, $redirectUrl);
    }

    /** @test */
    public function it_handles_webhook_checkout_session_completed(): void
    {
        Queue::fake();

        // Arrange: Create pending purchase with Stripe session ID
        $service = Service::factory()->create();
        $purchase = Purchase::factory()->create([
            'service_id' => $service->id,
            'payment_id' => 'cs_test_123',
            'amount' => 2900,
            'status' => 'pending',
        ]);

        // Simulate checkout.session.completed event data
        $eventData = [
            'id' => 'cs_test_123',
            'amount_total' => 2900,
            'customer_details' => [
                'email' => 'buyer@example.com',
            ],
        ];

        // Act: Process webhook through job
        $job = new ProcessStripeWebhook('checkout.session.completed', $eventData, 'evt_test_123');
        $job->handle();

        // Assert: Purchase marked as paid, email set
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);
        $this->assertEquals('buyer@example.com', $purchase->email);

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

        // Simulate payment_intent.payment_failed event data
        $eventData = [
            'id' => 'pi_test_failed',
            'status' => 'failed',
            'last_payment_error' => [
                'message' => 'Card declined',
            ],
        ];

        // Act: Process webhook through job
        $job = new ProcessStripeWebhook('payment_intent.payment_failed', $eventData, 'evt_test_failed');
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
            'payment_id' => 'cs_idempotent',
            'amount' => 2900,
            'status' => 'pending',
        ]);

        $eventData = [
            'id' => 'cs_idempotent',
            'amount_total' => 2900,
            'customer_details' => ['email' => 'buyer@example.com'],
        ];

        // Act: Process webhook twice
        $job1 = new ProcessStripeWebhook('checkout.session.completed', $eventData, 'evt_idempotent');
        $job1->handle();

        $job2 = new ProcessStripeWebhook('checkout.session.completed', $eventData, 'evt_idempotent');
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
        ]);

        // Assert: Activity log should be created
        $this->assertDatabaseHas('activity_logs', [
            'event_type' => 'payment_started',
        ]);
    }

    /** @test */
    public function successful_payment_redirects_to_success_page_with_token(): void
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
        $response = $this->post(route('payment.mock.pay', $purchase), [
            'email' => 'buyer@example.com',
        ]);

        // Assert: Redirects to success page with token
        $access = Access::first();
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString('payment/success', $redirectUrl);
        $this->assertStringContainsString('token=' . $access->access_token, $redirectUrl);
    }
}
