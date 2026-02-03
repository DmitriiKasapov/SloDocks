<?php

namespace Database\Factories;

use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'email' => fake()->safeEmail(),
            'payment_provider' => 'stripe',
            'payment_id' => 'cs_test_' . fake()->uuid(),
            'amount' => fake()->numberBetween(1000, 10000),
            'currency' => 'EUR',
            'status' => 'pending',
        ];
    }

    /**
     * Indicate that the purchase is paid
     */
    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paid',
        ]);
    }

    /**
     * Indicate that the purchase failed
     */
    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'failed',
        ]);
    }

    /**
     * Set mock payment provider
     */
    public function mock(): static
    {
        return $this->state(fn (array $attributes) => [
            'payment_provider' => 'mock',
            'payment_id' => 'mock_' . fake()->uuid(),
        ]);
    }
}
