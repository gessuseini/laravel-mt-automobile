<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->string('website_email')->default('info@domain.com')->nullable();
            $table->string('website_facebook')->default('https://facebook.com/')->nullable();
            $table->string('website_instagram')->default('https://instagram.com/')->nullable();
            $table->string('website_twitter')->default('https://twitter.com/')->nullable();
            $table->string('website_linkedin')->default('https://linkedin.com/')->nullable();
            $table->string('website_theme_color')->default('#1E69B8')->nullable();
        });
    }

    public function down()
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->dropColumn([
                'website_email',
                'website_facebook',
                'website_instagram',
                'website_twitter',
                'website_linkedin',
                'website_theme_color'
            ]);
        });
    }

};
