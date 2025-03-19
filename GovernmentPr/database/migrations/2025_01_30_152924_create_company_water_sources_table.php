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
        Schema::create('company_water_sources', function (Blueprint $table) {
            $table->id('CompanyWaterSourcesID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('WaterSources_id');
        
            $table->foreign('companyID')
                ->references('id') // Specify the primary key in the water_sources table
                ->on('water_sources')
                ->onDelete('cascade');
        
            $table->foreign('WaterSources_id')
                ->references('id') // Assuming water_sources has 'id' as its primary key
                ->on('water_sources')
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
        Schema::dropIfExists('company_water_sources');
    }
};
