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
            $table->string('WaterSourcesName');
            $table->string('location')->nullable();
            $table->decimal('capacity', 10, 2);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('WaterSources_id');
            $table->foreign('companyID')
                    ->references('company_id')
                    ->on('companies')
                    ->onDelete('cascade');
            $table->foreign('WaterSources_id')
                    ->references('WaterSourcesId')
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
