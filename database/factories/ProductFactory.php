<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => fake()->name(),
            'price' => fake()->numerify(),
            'image' => fake()->imageUrl(),
            'description' => fake()->text(),
            'brand_id' =>1,
            'category_id' =>1,
        ];
    }
}
