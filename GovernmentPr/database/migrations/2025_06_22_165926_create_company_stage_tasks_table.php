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
        Schema::create('company_stage_tasks', function (Blueprint $table) {
            $table->id('stage_task_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('company_stage_id');
            $table->string('task_name');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->enum('status', ['pending', 'completed', 'overdue'])->default('pending');
            $table->json('supervisor_ids')->nullable();
            $table->json('task_tag_ids')->nullable();
            // Additional fields for task management
            $table->unsignedBigInteger('created_by')->nullable(); // User ID of the creator
            $table->string('guard')->nullable(); // Guard for the user who created the task

            $table->unsignedBigInteger('updated_by')->nullable(); // User ID of the updated task
            $table->string('updated_guard')->nullable(); // Guard for the user who updated the task
            
            // Soft delete flag
            $table->boolean('is_deleted')->default(false);
            // Timestamps for tracking task progress
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('company_stage_id')->references('id')->on('company_stages')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_stage_tasks');
    }
};
