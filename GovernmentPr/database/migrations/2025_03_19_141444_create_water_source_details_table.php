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
        Schema::create('water_source_details', function (Blueprint $table) {
            $table->id('water_source_detail_ID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('company_water_source_id');
            $table->string('location');
            $table->string('capacity')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->foreign('companyID')->references('company_id')->on('companies');
            $table->foreign('company_water_source_id')->references('CompanyWaterSourcesID')->on('company_water_sources');
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
        Schema::dropIfExists('water_source_details');
    }
};
