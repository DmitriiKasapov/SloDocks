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
        $response->assertSee('50.00'); // Price display

        // Step 2: User clicks on service and views details
        $response = $this->get(route('services.show', $service->slug));
        $response->assertStatus(200);
        $response->assertSee($service->title);
        $response->assertSee($service->description_public);

        // Should NOT see private content without token
        $response->assertDontSee('content-block');

        // Step 3: User submits payment form (mock mode)
        Queue::fake();

        $response = $this->post(route('payment.create'), [
            'service_id' => $service->id,
            'email' => 'user@example.com',
        ]);

        // Should create Purchase and redirect to mock checkout
        $this->assertEquals(1, Purchase::count());
        $purchase = Purchase::first();
        $this->assertEquals('pending', $purchase->status);
        $this->assertEquals('user@example.com', $purchase->email);

        $response->assertRedirect();
        $response->assertRedirectContains('/payment/mock/');

        // Step 4: User completes mock payment
        $response = $this->get(route('payment.mock.checkout', $purchase));
        $response->assertStatus(200);
        $response->assertSee('50.00');

        $response = $this->post(route('payment.mock.pay', $purchase));

        // Purchase should be marked as paid
        $purchase->refresh();
        $this->assertEquals('paid', $purchase->status);

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

        // Should redirect to service page with token
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString($service->slug, $redirectUrl);
        $this->assertStringContainsString('token=', $redirectUrl);

        // Step 5: User accesses private content with token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => $access->access_token,
        ]));

        $response->assertStatus(200);
        $response->assertSee('У вас есть доступ'); // Access granted banner
        $response->assertSee('content-block'); // Private content should be visible
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

        // Act: Try to access with expired token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => $access->access_token,
        ]));

        // Assert: Should see error message
        $response->assertStatus(200);
        $response->assertSee('Срок доступа истёк'); // Expired message
        $response->assertDontSee('content-block'); // Should not see private content
    }

    /** @test */
    public function user_can_purchase_multiple_services(): void
    {
        Queue::fake();

        // Arrange: Create two services
        $service1 = Service::factory()->create(['slug' => 'service-1']);
        $service2 = Service::factory()->create(['slug' => 'service-2']);

        $email = 'buyer@example.com';

        // Act: Purchase both services
        $this->post(route('payment.create'), [
            'service_id' => $service1->id,
            'email' => $email,
        ]);

        $purchase1 = Purchase::where('service_id', $service1->id)->first();
        $this->post(route('payment.mock.pay', $purchase1));

        $this->post(route('payment.create'), [
            'service_id' => $service2->id,
            'email' => $email,
        ]);

        $purchase2 = Purchase::where('service_id', $service2->id)->first();
        $this->post(route('payment.mock.pay', $purchase2));

        // Assert: Should have 2 purchases, 2 accesses, 1 user
        $this->assertEquals(2, Purchase::where('email', $email)->count());
        $this->assertEquals(2, Access::count());
        $this->assertEquals(1, User::where('email', $email)->count());

        // User statistics should be updated
        $user = User::where('email', $email)->first();
        $this->assertEquals(2, $user->purchases_count);
        $this->assertNotNull($user->first_purchase_at);
        $this->assertNotNull($user->last_purchase_at);
    }

    /** @test */
    public function payment_validation_rejects_invalid_email(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act: Submit with invalid email
        $response = $this->post(route('payment.create'), [
            'service_id' => $service->id,
            'email' => 'not-an-email',
        ]);

        // Assert: Should fail validation
        $response->assertSessionHasErrors('email');
        $this->assertEquals(0, Purchase::count());
    }

    /** @test */
    public function payment_validation_rejects_non_existent_service(): void
    {
        // Act: Submit with non-existent service
        $response = $this->post(route('payment.create'), [
            'service_id' => 99999,
            'email' => 'test@example.com',
        ]);

        // Assert: Should fail validation
        $response->assertSessionHasErrors('service_id');
        $this->assertEquals(0, Purchase::count());
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
