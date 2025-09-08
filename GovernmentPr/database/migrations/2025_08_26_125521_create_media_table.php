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
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('media_id'); // Primary key
            $table->string('original_name');   // Original file name
            $table->string('path');            // File storage path
            $table->string('url');             // Accessible URL
            $table->string('mime_type', 100);  // File type (e.g., image/png)
            $table->unsignedBigInteger('size'); // File size in bytes
            $table->string('category')->nullable(); // Optional category
            $table->string('guard')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable(); // Foreign key to users table
            
            $table->timestamps(); // created_at & updated_at

            // Add foreign key if uploaded_by links to users table
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
