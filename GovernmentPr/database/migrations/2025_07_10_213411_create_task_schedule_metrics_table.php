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
        Schema::create('task_schedule_metrics', function (Blueprint $table) {
            $table->id('task_schedule_metric_id'); // Primary key for the task_schedule_metrics table
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('task_schedule_id'); // Foreign key to the task_schedule table
            $table->decimal('expected_chemical_quantity', 15, 3)->nullable();
            $table->decimal('expected_material_quantity', 15, 3)->nullable();
            $table->decimal('expected_water_quantity', 15, 3)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('task_schedule_id')->references('task_schedule_id')->on('task_schedules')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('task_schedule_metrics');
    }
};
