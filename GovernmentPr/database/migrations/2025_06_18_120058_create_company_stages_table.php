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
        Schema::create('company_stages', function (Blueprint $table) {
            $table->id('stage_id');
            $table->unsignedBigInteger('company_id');   // Assuming this is the company ID
            $table->unsignedBigInteger('workflow_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('estimated_time', 8, 2)->default(0.00); // Estimated time in hours
            $table->integer('sequence')->default(0);
            $table->enum('status', [
                'Pending',
                'In Progress',
                'Completed',
                'Cancelled',
                'On Hold',
                'Approved',
                'Rejected'
            ])->default('Pending');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('workflow_id')->references('workflow_id')->on('workflows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_stages');
    }
};
