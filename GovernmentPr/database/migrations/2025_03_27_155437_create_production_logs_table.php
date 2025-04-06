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
        Schema::create('production_logs', function (Blueprint $table) {
            $table->id('production_log_id');
            $table->string('production_title', 255);
            $table->unsignedBigInteger('company_operation_id');
            $table->json('material_log_data')->nullable();
            $table->json('chemical_log_data')->nullable();
            $table->unsignedBigInteger('company_id');
            // $table->json('equipment_log_data');
            $table->string('water_volume');
            $table->json('product_log_data');
            // $table->string('shift')->nullable();
            $table->unsignedBigInteger('calendar_year_id')->nullable();
            $table->string('production_date');
            $table->enum('production_status', ['halted', 'ongoing', 'completed', 'failed']);
            $table->timestamp('logged_at')->useCurrent();
            $table->timestamps();
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('company_operation_id')->references('company_operation_id')->on('company_operations')->onDelete('cascade');
            $table->foreign('calendar_year_id')->references('calendar_year_id')->on('calendar_years')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_logs');
    }
};
