<?php

namespace Tests\Unit;

use App\Models\Access;
use App\Models\Service;
use App\Services\AccessService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessServiceTest extends TestCase
{
    use RefreshDatabase;

    private AccessService $accessService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->accessService = new AccessService();
    }

    /** @test */
    public function it_returns_valid_result_for_active_access_with_correct_token(): void
    {
        // Arrange: Create service and active access
        $service = Service::factory()->create();
        $access = Access::factory()->create([
            'service_id' => $service->id,
            'access_token' => 'valid_token_123',
            'is_active' => true,
            'starts_at' => now()->subDay(),
            'expires_at' => now()->addDay(),
        ]);

        // Act: Check access
        $result = $this->accessService->check($service->slug, 'valid_token_123');

        // Assert: Should be valid
        $this->assertTrue($result->isValid());
        $this->assertEquals('valid', $result->status);
        $this->assertEquals($access->id, $result->access->id);
    }

    /** @test */
    public function it_returns_no_token_result_when_token_is_null(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act: Check with null token
        $result = $this->accessService->check($service->slug, null);

        // Assert: Should be no_token
        $this->assertFalse($result->isValid());
        $this->assertEquals('no_token', $result->status);
        $this->assertNull($result->access);
    }

    /** @test */
    public function it_returns_invalid_service_result_for_inactive_service(): void
    {
        // Arrange: Create inactive service
        $service = Service::factory()->inactive()->create();

        // Act: Check access
        $result = $this->accessService->check($service->slug, 'any_token');

        // Assert: Should be invalid_service
        $this->assertFalse($result->isValid());
        $this->assertEquals('invalid_service', $result->status);
        $this->assertNull($result->access);
    }

    /** @test */
    public function it_returns_invalid_token_result_for_wrong_token(): void
    {
        // Arrange
        $service = Service::factory()->create();
        Access::factory()->create([
            'service_id' => $service->id,
            'access_token' => 'correct_token',
            'is_active' => true,
            'expires_at' => now()->addDay(),
        ]);

        // Act: Check with wrong token
        $result = $this->accessService->check($service->slug, 'wrong_token');

        // Assert: Should be invalid_token
        $this->assertFalse($result->isValid());
        $this->assertEquals('invalid_token', $result->status);
        $this->assertNull($result->access);
    }

    /** @test */
    public function it_returns_invalid_token_result_for_token_of_different_service(): void
    {
        // Arrange: Create two services
        $service1 = Service::factory()->create();
        $service2 = Service::factory()->create();

        Access::factory()->create([
            'service_id' => $service1->id,
            'access_token' => 'service1_token',
            'is_active' => true,
            'expires_at' => now()->addDay(),
        ]);

        // Act: Check service2 with service1's token
        $result = $this->accessService->check($service2->slug, 'service1_token');

        // Assert: Should be invalid_token (wrong service)
        $this->assertFalse($result->isValid());
        $this->assertEquals('invalid_token', $result->status);
        $this->assertNull($result->access);
    }

    /** @test */
    public function it_returns_inactive_result_for_inactive_access(): void
    {
        // Arrange: Create inactive access
        $service = Service::factory()->create();
        Access::factory()->inactive()->create([
            'service_id' => $service->id,
            'access_token' => 'inactive_token',
            'expires_at' => now()->addDay(),
        ]);

        // Act: Check access
        $result = $this->accessService->check($service->slug, 'inactive_token');

        // Assert: Should be inactive
        $this->assertFalse($result->isValid());
        $this->assertEquals('inactive', $result->status);
        $this->assertNull($result->access);
    }

    /** @test */
    public function it_returns_expired_result_for_expired_access(): void
    {
        // Arrange: Create expired access
        $service = Service::factory()->create();
        $access = Access::factory()->expired()->create([
            'service_id' => $service->id,
            'access_token' => 'expired_token',
            'is_active' => true,
        ]);

        // Act: Check access
        $result = $this->accessService->check($service->slug, 'expired_token');

        // Assert: Should be expired
        $this->assertFalse($result->isValid());
        $this->assertEquals('expired', $result->status);
        $this->assertEquals($access->id, $result->access->id);
    }
}
