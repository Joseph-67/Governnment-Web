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
        Schema::create('business_contacts', function (Blueprint $table) {
            $table->id('businesscontactID');
            $table->unsignedBigInteger('businessID');
            $table->string('email');
            $table->string('primary_tel_number');
            $table->string('secondary_tel_number')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('website_url')->nullable();
            $table->string('instagram_links')->nullable();
            $table->string('facebook_links')->nullable();
            $table->string('twitter_links')->nullable();
            $table->foreign('businessID')
            ->references('business_id')
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
        Schema::dropIfExists('business_contacts');
    }
};
