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
        Schema::create('pages', function (Blueprint $table) {
            $table->id('page_id');

            // Core identity
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt', 500)->nullable();
            $table->longText('body')->nullable(); // WYSIWYG/Quill content

            // Media
            $table->string('featured_image')->nullable();
            $table->string('hero_image')->nullable();
            $table->json('image_slider')->nullable(); // array of images
            $table->json('gallery')->nullable();      // array of images

            // SEO
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description', 500)->nullable();
            $table->string('og_image')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_description', 500)->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();

            // Customization
            $table->json('custom_css')->nullable();
            $table->json('custom_js')->nullable();
            $table->json('custom_head')->nullable();
            $table->json('custom_body')->nullable();

            // Access control
            $table->boolean('is_private')->default(false);
            $table->string('password')->nullable();
            $table->json('visibility_roles')->nullable();

            // Scheduling
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['draft', 'scheduled', 'published', 'archived'])->default('draft');

            // Metadata
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->json('categories')->nullable();
            $table->json('tags')->nullable();
            $table->json('revision_notes')->nullable();

            // Analytics & experiments
            $table->json('analytics')->nullable();
            $table->json('ab_tests')->nullable();
            $table->json('goals')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
