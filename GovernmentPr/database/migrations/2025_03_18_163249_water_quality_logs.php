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
        //
        Schema::create('water_quality_logs', function (Blueprint $table) {
            $table->id('quality_id');
            $table->unsignedBigInteger('companyID');
            $table->unsignedBigInteger('CompanyWaterSourcesID');
            $table->decimal('quantity_used', 10, 2);
            $table->string('ph_level', 20);
            $table->text('contaminants');
            $table->text('test_results');
            $table->date('usage_date');
            $table->text('purpose');

            $table->foreign('companyID')->references('company_id')
            ->on('companies')
            ->onDelete('cascade');
            $table->foreign('CompanyWaterSourcesID')->references('CompanyWaterSourcesID')->on('company_water_sources')->onDelete('cascade');
    $table->enum('status', ['active', 'inactive'])->default('active');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
