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
        Schema::create('company_water_conservation_opportunities', function (Blueprint $table) {
            $table->id('CompanyWaterConservationOpportunityID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('conservation_id');
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
                    ->onDelete('cascade');
            $table->foreign('conservation_id')
                    ->references('WaterConservationMethodId')
                    ->on('water_conservation_methods')
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
        Schema::dropIfExists('company_water_conservation_opportunities');
    }
};
