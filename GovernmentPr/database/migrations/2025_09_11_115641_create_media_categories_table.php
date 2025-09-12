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
        Schema::create('media_categories', function (Blueprint $table) {
            $table->id('category_id');        // Primary key
            $table->string('name')->unique(); // Category name (e.g., Images, Documents, Videos)
            $table->string('description')->nullable(); // Optional description
            $table->timestamps();             // created_at & updated_at
        });

        // Add category_id to media table
        Schema::table('media', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('size');
            $table->foreign('category_id')
                ->references('category_id')
                ->on('media_categories')
                ->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, remove the foreign key and column from the media table
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });

        // Then drop the media_categories table
        Schema::dropIfExists('media_categories');
    }

};
