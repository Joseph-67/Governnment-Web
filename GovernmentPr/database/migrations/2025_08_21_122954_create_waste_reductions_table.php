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
        if (!Schema::hasTable('waste_reductions')) {
            Schema::create('waste_reductions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->string('month'); // e.g. "2025-08" (Year-Month format)
                $table->decimal('waste_reduced', 10, 2)->default(0); // tons reduced
                $table->timestamps();

                // Foreign key to companies
                $table->foreign('company_id')
                    ->references('company_id') // or 'company_id' if that's the PK
                    ->on('companies')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_reductions');
    }
};
