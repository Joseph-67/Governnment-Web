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
            $table->unsignedBigInteger('WaterSources_id');
            $table->string('location');
            $table->string('capacity')->nullable();
            $table->string('status');
            $table->foreign('companyID')->references('company_id')->on('companies');
            $table->foreign('WaterSources_id')->references('WaterSourcesId')->on('water_sources');
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
