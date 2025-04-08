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
        Schema::create('annual_operations_logs', function (Blueprint $table) {
            $table->id('annual_operations_log_id');
            $table->string('operation_name');
            $table->unsignedBigInteger('operation_id');
            $table->unsignedBigInteger('calendar_year_id');
            
            // These are now JSON arrays (no foreign keys)
            $table->json('companyMaterialId')->nullable();
            $table->json('company_waste_id')->nullable();
            $table->json('company_chemical_id')->nullable();
            $table->json('product_id')->nullable();
            $table->unsignedBigInteger('company_id');
            
            $table->json('expected_quantity')->nullable();
            $table->json('expected_quantity_chemical')->nullable();
            $table->string('operations_per_year');
            $table->string('water_used_per_year');
            $table->string('units_produced_per_year');
            $table->json('quantity_of_waste')->nullable();
            
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            // Keep only scalar foreign keys
            $table->foreign('operation_id')->references('company_operation_id')->on('company_operations');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years');
            $table->foreign('company_id')->references('company_id')->on('companies');
            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annual_operations_logs');
    }
};
