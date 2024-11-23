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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->string('company_name')->unique();
            $table->string('industry');
            $table->string('email');
            $table->string('primary_phone_number');
            $table->string('secondary_phone_number')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('gis_location');
            $table->string('website_url')->nullable();
            $table->string('date_of_establishment')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('contact_person')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
