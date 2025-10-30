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
        Schema::create('cms_page_categories', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('cms_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_page_categories');
    }
};
