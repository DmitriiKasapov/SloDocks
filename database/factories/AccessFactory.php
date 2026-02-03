<?php

namespace Database\Factories;

use App\Models\Access;
use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AccessFactory extends Factory
{
    protected $model = Access::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'purchase_id' => Purchase::factory(),
            'email' => fake()->safeEmail(),
            'access_token' => Str::random(64),
            'starts_at' => now(),
            'expires_at' => now()->addDays(30),
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the access is expired
     */
    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'starts_at' => now()->subDays(40),
            'expires_at' => now()->subDay(),
        ]);
    }

    /**
     * Indicate that the access is inactive
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Set access to start in the future
     */
    public function future(): static
    {
        return $this->state(fn (array $attributes) => [
            'starts_at' => now()->addDay(),
            'expires_at' => now()->addDays(31),
        ]);
    }

    /**
     * Set specific token
     */
    public function token(string $token): static
    {
        return $this->state(fn (array $attributes) => [
            'access_token' => $token,
        ]);
    }
}
