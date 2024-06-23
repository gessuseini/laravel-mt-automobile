<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->default('Default Website Name');
            $table->string('website_logo')->nullable();
            $table->string('website_icon')->nullable();
            $table->string('website_phone_number')->default('000-000-0000');
            $table->string('website_domain')->default('www.defaultdomain.com');
            $table->string('website_contact_address')->default('123 Default Address');
            $table->string('website_contact_address')->default('123 Default Address');
            $table->string('website_contact_address')->default('123 Default Address');
            $table->timestamps();
        });

        // Insert default settings
        DB::table('global_settings')->insert([
            'website_name' => 'Default Website Name',
            'website_phone_number' => '000-000-0000',
            'website_domain' => 'www.defaultdomain.com',
            'website_contact_address' => '123 Default Address',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('global_settings');
    }
}
