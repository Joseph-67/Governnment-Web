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
        Schema::create('task_employees', function (Blueprint $table) {
            $table->id('task_employee_id'); // Primary key for the task_employee table
            $table->unsignedBigInteger('company_id'); // Foreign key to the task_objectives table
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('employee_id');
            $table->enum('status', ['assigned', 'in_progress', 'completed', 'cancelled'])->default('assigned'); // Status of the employee in the task
            $table->text('comments')->nullable(); // Comments or notes about the assignment
            $table->timestamp('assigned_at')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('stage_task_id')->on('company_stage_tasks')->onDelete('cascade');
            $table->foreign('employee_id')->references('EmployeeID')->on('company_employees')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->unique(['task_id', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_employees');
    }
};
