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
        Schema::create('disposal_methods', function (Blueprint $table) {
            $table->id('disposal_method_id');
            $table->string('method_name');        // Name of the disposal method
            $table->text('description')->nullable(); // Optional description
            $table->string('safety_level')->nullable(); // e.g., Low, Medium, High
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposal_methods');
    }
};
