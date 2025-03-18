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
        Schema::create('company_water_usages', function (Blueprint $table) {
            $table->id('companyWaterUsageID');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('CompanyWaterSourcesID');
            $table->foreign('CompanyWaterSourcesID')
                ->references('CompanyWaterSourcesID')
                ->on('company_water_sources')
                ->onDelete('cascade');
            $table->string('volume');
            $table->enum('date_type', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->string('date');
            $table->string('remark')->nullable();
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
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
        Schema::dropIfExists('company_water_usages');
    }
};
