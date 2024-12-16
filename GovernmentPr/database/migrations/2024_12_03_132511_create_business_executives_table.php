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
        Schema::create('business_executives', function (Blueprint $table) {
            $table->id('directorID');
            $table->unsignedBigInteger('businessID');
            $table->string('director_name');
            $table->string('position');
            $table->string("primary_tel_number");
            $table->string("secondary_tel_number")->nullable();
            $table->string("email")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("address")->nullable();
            $table->string("website_url")->nullable();
            $table->string("instagram_link")->nullable();
            $table->string("facebook_link")->nullable();
            $table->string("twitter_link")->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('businessID')
            ->references('businessID')
            ->on('businesses')
            ->onDelete('cascade');
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
        Schema::dropIfExists('business_executives');
    }
};