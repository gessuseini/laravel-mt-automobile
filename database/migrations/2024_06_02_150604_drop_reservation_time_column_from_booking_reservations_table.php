<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('booking_reservations', function (Blueprint $table) {
            $table->dropColumn('reservation_time');
        });
    }

    public function down()
    {
        Schema::table('booking_reservations', function (Blueprint $table) {
            $table->timestamp('reservation_time')->nullable();
        });
    }

};
