<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FashionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productName' => fake()->randomElement(['bag', 'box', 'blouse','skirt']),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2),
            'published' => fake()->numberBetween(0, 1),
            'image' =>basename( fake()->image(public_path('asset/images/products'))),
        ];
    }
}
