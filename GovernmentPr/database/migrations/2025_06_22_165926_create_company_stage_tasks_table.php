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
