<?php

namespace Tests\Feature;

use App\Models\Access;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UserFlowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function complete_user_journey_from_home_to_content_access(): void
    {
        // Arrange: Create a service
        $service = Service::factory()->price(5000)->create([
            'slug' => 'test-service',
            'title' => 'Test Service',
            'access_duration_days' => 30,
            'is_active' => true,
        ]);

        // Step 1: User visits home page
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($service->title);

        // Step 2: User clicks on service and views details
        $response = $this->get(route('services.show', $service->slug));
        $response->assertStatus(200);
        $response->assertSee($service->title);
        $response->assertSee($service->description_public);

        // Step 3: User submits payment form — email no longer required at this step
        Queue::fake();

        $response = $this->post(route('payment.create'), [
            'service_id' => $service->id,
        ]);

        // Should create Purchase and redirect to mock checkout
        $this->assertEquals(1, Purchase::count());
        $purchase = Purchase::first();
        $this->assertEquals('pending', $purchase->status);
        $this->assertNull($purchase->email); // email collected at mock checkout step

        $response->assertRedirect();
        $response->assertRedirectContains('/payment/mock/');

        // Step 4: User completes mock payment — email collected here
        $response = $this->get(route('payment.mock.checkout', $purchase));
        $response->assertStatus(200);

        $response = $this->post(route('payment.mock.pay', $purchase), [
            'email' => 'user@example.com',
        ]);

        // Purchase should be marked as paid with email
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);
        $this->assertEquals('user@example.com', $purchase->email);

        // Access should be created
        $this->assertEquals(1, Access::count());
        $access = Access::first();
        $this->assertEquals($service->id, $access->service_id);
        $this->assertEquals($purchase->id, $access->purchase_id);
        $this->assertTrue($access->is_active);

        // User should be created
        $this->assertEquals(1, User::count());
        $user = User::first();
        $this->assertEquals('user@example.com', $user->email);

        // Should redirect to success page with token
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString('payment/success', $redirectUrl);
        $this->assertStringContainsString('token=', $redirectUrl);

        // Step 5: User accesses service page with token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => $access->access_token,
        ]));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_cannot_access_content_with_expired_access(): void
    {
        // Arrange: Service with expired access
        $service = Service::factory()->create();
        $purchase = Purchase::factory()->paid()->create([
            'service_id' => $service->id,
        ]);
        $access = Access::factory()->expired()->create([
            'service_id' => $service->id,
            'purchase_id' => $purchase->id,
            'is_active' => true, // Still marked as active, but expired
        ]);

        // Act: Try to access with expired token — resolveAccess returns null (expires_at check)
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => $access->access_token,
        ]));

        // Assert: Page loads but user has no access (token expired)
        $response->assertStatus(200);
        // hasAccess = false, so CTA to buy is shown instead of content
        $this->assertFalse($response->original->getData()['hasAccess'] ?? false);
    }

    /** @test */
    public function user_can_purchase_multiple_services(): void
    {
        Queue::fake();

        // Arrange: Create two services
        $service1 = Service::factory()->create(['slug' => 'service-1']);
        $service2 = Service::factory()->create(['slug' => 'service-2']);

        $email = 'buyer@example.com';

        // Act: Purchase service 1
        $this->post(route('payment.create'), ['service_id' => $service1->id]);
        $purchase1 = Purchase::where('service_id', $service1->id)->first();
        $this->post(route('payment.mock.pay', $purchase1), ['email' => $email]);

        // Act: Purchase service 2
        $this->post(route('payment.create'), ['service_id' => $service2->id]);
        $purchase2 = Purchase::where('service_id', $service2->id)->first();
        $this->post(route('payment.mock.pay', $purchase2), ['email' => $email]);

        // Assert: 2 accesses created
        $this->assertEquals(2, Access::count());

        // Assert: 1 user record (same email)
        $this->assertEquals(1, User::where('email', $email)->count());

        // User statistics should be updated
        $user = User::where('email', $email)->first();
        $this->assertEquals(2, $user->purchases_count);
        $this->assertNotNull($user->first_purchase_at);
        $this->assertNotNull($user->last_purchase_at);
    }

    /** @test */
    public function payment_validation_rejects_non_existent_service(): void
    {
        // Act: Submit with non-existent service
        $response = $this->post(route('payment.create'), [
            'service_id' => 99999,
        ]);

        // Assert: Should fail validation
        $response->assertSessionHasErrors('service_id');
        $this->assertEquals(0, Purchase::count());
    }

    /** @test */
    public function mock_pay_validation_rejects_invalid_email(): void
    {
        // Arrange
        $purchase = Purchase::factory()->create(['status' => 'pending']);

        // Act: Submit with invalid email on mock pay form
        $response = $this->post(route('payment.mock.pay', $purchase), [
            'email' => 'not-an-email',
        ]);

        // Assert: Should fail validation
        $response->assertSessionHasErrors('email');
        $purchase->refresh();
        $this->assertEquals('pending', $purchase->status);
        $this->assertEquals(0, Access::count());
    }

    /** @test */
    public function inactive_service_returns_404(): void
    {
        // Arrange: Inactive service
        $service = Service::factory()->inactive()->create();

        // Act
        $response = $this->get(route('services.show', $service->slug));

        // Assert
        $response->assertStatus(404);
    }

    /** @test */
    public function home_page_only_shows_active_services(): void
    {
        // Arrange
        $activeService = Service::factory()->create(['title' => 'Active Service']);
        $inactiveService = Service::factory()->inactive()->create(['title' => 'Inactive Service']);

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Active Service');
        $response->assertDontSee('Inactive Service');
    }
}
