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
        Schema::create('company_operations', function (Blueprint $table) {
            $table->id('company_operation_id');
            $table->string('operation_name');
            $table->text('description')->nullable();
            $table->string('operation_code', 255)->nullable();
            $table->unsignedBigInteger('operation_type_id')->nullable();
            $table->unsignedBigInteger('operation_category_id')->nullable();
            $table->string('operation_unit', 255)->nullable();
            $table->string('operation_unit_price', 255)->nullable();
            $table->string('operation_unit_cost', 255)->nullable();
            $table->string('operation_unit_time', 255)->nullable();
            $table->unsignedBigInteger('company_id');
            $table->enum('status', ['pending', 'completed', 'inactive']);
            $table->decimal('expected_waste_per_operation', 8, 2)->nullable();
            $table->decimal('expected_water_usage_per_operation', 8, 2)->nullable();
            $table->integer('expected_unit_produced_for_goods')->nullable();
            $table->unsignedBigInteger('calendar_year_id')->nullable();
            $table->date('start_date')->nullable(); // Added start date column
            $table->date('end_date')->nullable(); // Added end date column
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('operation_type_id')->references('id')->on('operation_types')->onDelete('set null');
            $table->foreign('operation_category_id')->references('id')->on('operation_categories')->onDelete('set null');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years')->onDelete('set null');
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
        Schema::dropIfExists('company_operations');
    }
};
