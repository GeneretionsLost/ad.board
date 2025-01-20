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
            'subcategory_id' => fake()->numberBetween(1, 20),
            'name' => fake()->word(),
            'description' => implode(' ', fake()->sentences(rand(5, 10))),
            'price' => fake()->numberBetween(10, 1000) * 100,
            'created_at' => $createdAt = fake()->dateTimeBetween('-1 year', 'now'), // Генерация даты для created_at
            'updated_at' => $createdAt, // Использование той же даты для updated_at
        ];
    }
}
