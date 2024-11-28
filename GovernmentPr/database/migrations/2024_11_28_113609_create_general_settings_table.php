<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id('settings_id');
            $table->string('company_name');
            $table->string('slogan');
            $table->string('logo_darkmode');
            $table->string('logo_lightmode');
            $table->string('date_of_establishment');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('mission_statement');
            $table->string('vision_statement');
            $table->string('core_values');
            $table->string('about_company');
            $table->string('industry');
            $table->string('organization_type');
            $table->string('size');
            $table->string('registration_details');
            $table->string('abbreviation')->nullable();
            $table->string('favicon')->nullable();
            $table->string('instagram_links')->nullable();
            $table->string('facebook_links')->nullable();
            $table->string('twitter_links')->nullable();
            $table->string('websites_url')->nullable();
            $table->string('certifications')->nullable();
            $table->string('brand_color')->nullable();
            $table->string('brochures')->nullable();
            $table->string('corperate_presentations')->nullable();
            $table->string('promotional_photos')->nullable();
            $table->string('promotional_videos')->nullable();
            $table->string('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
};
