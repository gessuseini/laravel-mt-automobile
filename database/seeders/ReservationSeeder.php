<?php

namespace Database\Seeders;

use App\Models\BookingReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingReservation::factory(5)->create();
    }
}
