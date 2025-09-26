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
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(3, true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 50, 1000),
            'image' => $this->faker->imageUrl(400, 480, 'shoes', true, 'Faker'),
        ];
    }
}
