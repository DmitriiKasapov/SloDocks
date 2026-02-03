<?php

namespace Tests\Unit;

use App\Jobs\SendAccessEmail;
use App\Models\Access;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\User;
use App\Services\AccessGrantService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class AccessGrantServiceTest extends TestCase
{
    use RefreshDatabase;

    private AccessGrantService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AccessGrantService();
        Queue::fake();
    }

    /** @test */
    public function it_creates_access_for_paid_purchase(): void
    {
        // Arrange
        $service = Service::factory()->accessDuration(30)->create();
        $purchase = Purchase::factory()->paid()->create([
            'service_id' => $service->id,
            'email' => 'user@example.com',
        ]);

        // Act
        $access = $this->service->grantAccess($purchase);

        // Assert
        $this->assertInstanceOf(Access::class, $access);
        $this->assertEquals($purchase->id, $access->purchase_id);
        $this->assertEquals($purchase->service_id, $access->service_id);
        $this->assertEquals('user@example.com', $access->email);
        $this->assertTrue($access->is_active);
        $this->assertNotNull($access->access_token);
        $this->assertEquals(64, strlen($access->access_token));
    }

    /** @test */
    public function it_sets_correct_expiration_date_based_on_service_duration(): void
    {
        // Arrange: Service with 14 days access
        $service = Service::factory()->accessDuration(14)->create();
        $purchase = Purchase::factory()->paid()->create([
            'service_id' => $service->id,
        ]);

        // Act
        $access = $this->service->grantAccess($purchase);

        // Assert: expires_at should be 14 days from now
        $expectedExpiration = now()->addDays(14);
        $this->assertEquals(
            $expectedExpiration->format('Y-m-d H:i'),
            $access->expires_at->format('Y-m-d H:i')
        );
    }

    /** @test */
    public function it_is_idempotent_and_returns_existing_access(): void
    {
        // Arrange
        $purchase = Purchase::factory()->paid()->create();

        // Act: Grant access twice
        $access1 = $this->service->grantAccess($purchase);
        $access2 = $this->service->grantAccess($purchase);

        // Assert: Should return the same access
        $this->assertEquals($access1->id, $access2->id);
        $this->assertEquals($access1->access_token, $access2->access_token);

        // Assert: Should only have one access record
        $this->assertEquals(1, Access::where('purchase_id', $purchase->id)->count());
    }

    /** @test */
    public function it_generates_unique_access_tokens(): void
    {
        // Arrange
        $service = Service::factory()->create();
        $purchase1 = Purchase::factory()->paid()->create(['service_id' => $service->id]);
        $purchase2 = Purchase::factory()->paid()->create(['service_id' => $service->id]);

        // Act
        $access1 = $this->service->grantAccess($purchase1);
        $access2 = $this->service->grantAccess($purchase2);

        // Assert: Tokens should be different
        $this->assertNotEquals($access1->access_token, $access2->access_token);
    }

    /** @test */
    public function it_creates_new_user_on_first_purchase(): void
    {
        // Arrange
        $purchase = Purchase::factory()->paid()->create([
            'email' => 'newuser@example.com',
        ]);

        // Assert: No user exists yet
        $this->assertEquals(0, User::where('email', 'newuser@example.com')->count());

        // Act
        $this->service->grantAccess($purchase);

        // Assert: User was created with correct statistics
        $user = User::where('email', 'newuser@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals(1, $user->purchases_count);
        $this->assertNotNull($user->first_purchase_at);
        $this->assertNotNull($user->last_purchase_at);
        $this->assertEquals(
            $user->first_purchase_at->format('Y-m-d H:i'),
            $user->last_purchase_at->format('Y-m-d H:i')
        );
    }

    /** @test */
    public function it_updates_existing_user_statistics(): void
    {
        // Arrange: Create existing user
        $user = User::create([
            'email' => 'existing@example.com',
            'purchases_count' => 2,
            'first_purchase_at' => now()->subDays(10),
            'last_purchase_at' => now()->subDays(5),
        ]);

        $purchase = Purchase::factory()->paid()->create([
            'email' => 'existing@example.com',
        ]);

        // Act
        $this->service->grantAccess($purchase);

        // Assert: User statistics updated
        $user->refresh();
        $this->assertEquals(3, $user->purchases_count);
        $this->assertEquals(now()->format('Y-m-d H:i'), $user->last_purchase_at->format('Y-m-d H:i'));
        // first_purchase_at should not change
        $this->assertEquals(now()->subDays(10)->format('Y-m-d H:i'), $user->first_purchase_at->format('Y-m-d H:i'));
    }

    /** @test */
    public function it_dispatches_email_job(): void
    {
        // Arrange
        $purchase = Purchase::factory()->paid()->create();

        // Act
        $access = $this->service->grantAccess($purchase);

        // Assert: Email job was dispatched
        Queue::assertPushed(SendAccessEmail::class, function ($job) use ($access) {
            return $job->access->id === $access->id;
        });
    }
}
