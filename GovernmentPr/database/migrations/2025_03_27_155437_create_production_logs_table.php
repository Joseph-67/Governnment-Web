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
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('company_id');
            

            $table->json('equipment_log_data');
            $table->string('water_volume');
            $table->json('product_log_data');
            $table->string('shift')->nullable();
            $table->string('production_date');
            $table->string('production_status');
            $table->timestamp('logged_at')->useCurrent();
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('company_operation_id')->references('company_operation_id')->on('company_operations')->onDelete('cascade');
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
