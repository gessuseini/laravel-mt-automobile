<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->json('reservation_type');
            $table->date('reservation_date');
            $table->string('reservation_time');
            $table->string('reservation_brand');
            $table->string('reservation_model');
            $table->string('reservation_vin_num');
            $table->integer('reservation_mileage');
            $table->string('reservation_plate_number');
            $table->integer('reservation_year');
            $table->string('reservation_typeApproval');
            $table->longText('reservation_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_reservations');
    }
};
