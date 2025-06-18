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
        Schema::create('company_workflows', function (Blueprint $table) {
            $table->id('workflow_id');
            $table->unsignedBigInteger('company_id')->index();
            $table->string('workflow_name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->string('guard')->default('web');
            $table->string('status')->default('active'); // active, inactive, archived
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('company_id')
                ->references('company_id')
                ->on('companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_workflows');
    }
};
