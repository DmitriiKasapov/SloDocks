<?php

namespace Tests\Unit;

use App\Models\Purchase;
use App\Models\Service;
use App\Services\PaymentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentServiceTest extends TestCase
{
    use RefreshDatabase;

    private PaymentService $service;

    protected function setUp(): void
    {
        parent::setUp();

        // Ensure mock mode is enabled for tests
        config(['stripe.mock' => true]);

        $this->service = new PaymentService();
    }

    /** @test */
    public function it_creates_pending_purchase_record(): void
    {
        // Arrange
        $service = Service::factory()->price(5000)->create();

        // Act
        $this->service->createCheckoutSession($service, 'test@example.com');

        // Assert: Purchase was created
        $this->assertEquals(1, Purchase::count());

        $purchase = Purchase::first();
        $this->assertEquals($service->id, $purchase->service_id);
        $this->assertEquals('test@example.com', $purchase->email);
        $this->assertEquals(5000, $purchase->amount);
        $this->assertEquals('EUR', $purchase->currency);
        $this->assertEquals('pending', $purchase->status);
    }

    /** @test */
    public function it_uses_mock_payment_provider_in_mock_mode(): void
    {
        // Arrange
        config(['stripe.mock' => true]);
        $service = Service::factory()->create();

        // Act
        $this->service->createCheckoutSession($service, 'test@example.com');

        // Assert
        $purchase = Purchase::first();
        $this->assertEquals('mock', $purchase->payment_provider);
        $this->assertStringStartsWith('mock_', $purchase->payment_id);
    }

    /** @test */
    public function it_returns_mock_checkout_url_in_mock_mode(): void
    {
        // Arrange
        config(['stripe.mock' => true]);
        $service = Service::factory()->create();

        // Act
        $url = $this->service->createCheckoutSession($service, 'test@example.com');

        // Assert: Should return mock checkout route
        $purchase = Purchase::first();
        $expectedUrl = route('payment.mock.checkout', $purchase);
        $this->assertEquals($expectedUrl, $url);
    }

    /** @test */
    public function it_stores_correct_service_price_in_purchase(): void
    {
        // Arrange: Service with specific price
        $service = Service::factory()->price(12500)->create(); // 125 EUR

        // Act
        $this->service->createCheckoutSession($service, 'buyer@example.com');

        // Assert
        $purchase = Purchase::first();
        $this->assertEquals(12500, $purchase->amount);
    }

    /** @test */
    public function it_associates_purchase_with_correct_service(): void
    {
        // Arrange: Multiple services
        $service1 = Service::factory()->create();
        $service2 = Service::factory()->create();

        // Act: Create checkout for service2
        $this->service->createCheckoutSession($service2, 'user@example.com');

        // Assert: Purchase should be associated with service2
        $purchase = Purchase::first();
        $this->assertEquals($service2->id, $purchase->service_id);
        $this->assertNotEquals($service1->id, $purchase->service_id);
    }

    /** @test */
    public function it_creates_separate_purchases_for_multiple_checkouts(): void
    {
        // Arrange
        $service = Service::factory()->create();

        // Act: Create two checkouts
        $this->service->createCheckoutSession($service, 'user1@example.com');
        $this->service->createCheckoutSession($service, 'user2@example.com');

        // Assert: Should have 2 separate purchases
        $this->assertEquals(2, Purchase::count());

        $purchases = Purchase::all();
        $this->assertEquals('user1@example.com', $purchases[0]->email);
        $this->assertEquals('user2@example.com', $purchases[1]->email);
    }
}
