<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_brand' => fake()->text(),
            'vehicle_model' => fake()->text(),
            'vehicle_year' => fake()->randomNumber(4, true),
            'vehicle_transmission' => fake()->text,
            'vehicle_mileage' => fake()->randomNumber(5, true),
            'vehicle_image' => fake()->imageUrl(),
            'vehicle_description' => fake()->realText(500),
            'vehicle_price' => fake()->randomNumber(5, true),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
