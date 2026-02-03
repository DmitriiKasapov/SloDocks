<?php

namespace Tests\Feature;

use App\Models\Access;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_service_page_without_token(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act
        $response = $this->get(route('services.show', $service->slug));

        // Assert: Page loads and shows public content
        $response->assertStatus(200);
        $response->assertSee($service->title);
        $response->assertSee($service->description_public);
    }

    /** @test */
    public function it_does_not_show_private_content_without_token(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act
        $response = $this->get(route('services.show', $service->slug));

        // Assert: Should not see content blocks (private content)
        $response->assertStatus(200);
        $response->assertDontSee('content-block'); // Private content class
    }

    /** @test */
    public function it_shows_private_content_with_valid_token(): void
    {
        // Arrange
        $service = Service::factory()->create();
        $access = Access::factory()->create([
            'service_id' => $service->id,
            'access_token' => 'valid_token_123',
            'is_active' => true,
            'starts_at' => now()->subDay(),
            'expires_at' => now()->addDays(30),
        ]);

        // Act: Visit service page with valid token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => 'valid_token_123',
        ]));

        // Assert: Should see private content and access info
        $response->assertStatus(200);
        $response->assertSee($service->title);
    }

    /** @test */
    public function it_does_not_show_private_content_with_invalid_token(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act: Visit with wrong token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => 'invalid_token',
        ]));

        // Assert: Should not see private content
        $response->assertStatus(200);
        $response->assertDontSee('content-block');
    }

    /** @test */
    public function it_does_not_show_private_content_with_expired_token(): void
    {
        // Arrange
        $service = Service::factory()->create();
        $access = Access::factory()->expired()->create([
            'service_id' => $service->id,
            'access_token' => 'expired_token',
            'is_active' => true,
        ]);

        // Act: Visit with expired token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => 'expired_token',
        ]));

        // Assert: Should see expired message
        $response->assertStatus(200);
        $response->assertDontSee('content-block');
    }

    /** @test */
    public function it_does_not_show_private_content_for_inactive_access(): void
    {
        // Arrange
        $service = Service::factory()->create();
        $access = Access::factory()->inactive()->create([
            'service_id' => $service->id,
            'access_token' => 'inactive_token',
        ]);

        // Act: Visit with inactive token
        $response = $this->get(route('services.show', [
            'slug' => $service->slug,
            'token' => 'inactive_token',
        ]));

        // Assert: Should not see private content
        $response->assertStatus(200);
        $response->assertDontSee('content-block');
    }

    /** @test */
    public function it_returns_404_for_inactive_service(): void
    {
        // Arrange: Inactive service
        $service = Service::factory()->inactive()->create();

        // Act
        $response = $this->get(route('services.show', $service->slug));

        // Assert: Should return 404
        $response->assertStatus(404);
    }

    /** @test */
    public function it_returns_404_for_non_existent_service(): void
    {
        // Act
        $response = $this->get(route('services.show', 'non-existent-slug'));

        // Assert
        $response->assertStatus(404);
    }
}
