<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $title = fake()->words(3, true);

        return [
            'category_id' => Category::factory(),
            'title' => ucfirst($title),
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1, 9999),
            'description_public' => fake()->paragraph(3),
            'price' => fake()->numberBetween(1000, 10000), // 10-100 EUR in cents
            'access_duration_days' => fake()->randomElement([7, 14, 30, 60, 90]),
            'is_active' => true,
            'seo_title' => null,
            'seo_description' => null,
        ];
    }

    /**
     * Indicate that the service is inactive
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Set specific price
     */
    public function price(int $priceInCents): static
    {
        return $this->state(fn (array $attributes) => [
            'price' => $priceInCents,
        ]);
    }

    /**
     * Set specific access duration
     */
    public function accessDuration(int $days): static
    {
        return $this->state(fn (array $attributes) => [
            'access_duration_days' => $days,
        ]);
    }
}
