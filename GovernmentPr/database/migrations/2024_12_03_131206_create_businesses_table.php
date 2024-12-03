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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id("businessID");
            $table->string("business_name");
            $table->string("slogan")->nullable();
            $table->string("abbreviation")->nullable();
            $table->string("registration_number")->nullable();
            $table->string("industry")->nullable();
            $table->string("business_type")->nullable();
            $table->string("establishment_date")->nullable();
            $table->string("employees_number")->nullable();
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
        Schema::dropIfExists('businesses');
    }
};
