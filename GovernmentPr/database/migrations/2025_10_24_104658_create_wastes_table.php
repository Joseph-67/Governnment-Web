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
        Schema::create('wastes', function (Blueprint $table) {
            $table->id('waste_id');
            $table->foreignId('waste_category_id')->constrained('waste_categories', 'waste_category_id')->cascadeOnDelete();
            $table->string('name');
            $table->decimal('quantity_per_unit', 10, 2)->default(1.00);
            $table->string('unit');
            $table->text('description')->nullable();
            $table->enum('hazard_type', ['hazardous', 'non-hazardous'])->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
