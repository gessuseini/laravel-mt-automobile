<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_type' => fake()->text(),
            'reservation_date' => fake()->date(),
            'reservation_brand' => fake()->text(),
            'reservation_model' => fake()->text(),
            'reservation_vin_num' => fake()->randomNumber(5, true),
            'reservation_mileage' => fake()->randomNumber(5, true),
            'reservation_plate_number' => fake()->randomNumber(9, true),
            'reservation_year' => fake()->randomNumber(5, true),
            'reservation_typeApproval' => fake()->randomNumber(5, true),
            'reservation_description' => fake()->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
