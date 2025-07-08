<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_schedules', function (Blueprint $table) {
            $table->id('task_schedule_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('task_id');
            
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_recurrence')->default(false);
            $table->unsignedBigInteger('recurrence_rule_id')->nullable();
            
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('recurrence_rule_id')->references('recurrence_rule_id')->on('recurrence_rules')->onDelete('set null');
            $table->foreign('task_id')->references('stage_task_id')->on('company_stage_tasks')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_schedules');
    }
};
