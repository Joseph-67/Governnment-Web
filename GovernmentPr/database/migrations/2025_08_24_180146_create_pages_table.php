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
            
            // Basic content
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('menu_order')->default(0);
            $table->text('excerpt')->nullable();
            $table->longText('body')->nullable();

            // Status & scheduling
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('expire_at')->nullable();

            // Visibility
            $table->enum('visibility', ['public', 'private', 'password'])->default('public');
            $table->string('visibility_password')->nullable();

            // Relationships
            $table->foreignId('parent_id')->nullable()->constrained('pages')->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->enum('robots_index', ['index', 'noindex'])->default('index');
            $table->enum('robots_follow', ['follow', 'nofollow'])->default('follow');
            $table->json('custom_meta')->nullable(); // JSON meta

            // Open Graph & Twitter
            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Media
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable(); // JSON array
            $table->string('hero_bg')->nullable();

            // Layout
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();
            $table->string('template')->default('fullwidth');
            $table->string('layout_style')->default('default');
            $table->json('sidebar_widgets')->nullable();
            $table->json('footer_widgets')->nullable();

            // Components
            $table->boolean('enable_slider')->default(false);
            $table->json('slider_images')->nullable(); // JSON slides
            $table->json('reusable_components')->nullable();
            $table->boolean('contact_form_enabled')->default(false);
            $table->string('contact_form_email')->nullable();
            $table->string('contact_form_subject')->nullable();
            $table->json('contact_form_fields')->nullable();
            $table->boolean('newsletter_enabled')->default(false);
            $table->string('newsletter_provider')->nullable();
            $table->json('polls_surveys')->nullable();
            $table->json('dynamic_tables')->nullable();
            $table->json('conditional_logic')->nullable();
            $table->longText('embed_code')->nullable();
            $table->longText('custom_css')->nullable();

            // Custom Code
            $table->longText('custom_js')->nullable();
            $table->longText('custom_head')->nullable();
            $table->longText('custom_body')->nullable();

            // Access Control
            $table->json('visible_roles')->nullable();       // roles allowed
            $table->json('device_visibility')->nullable();   // desktop/tablet/mobile
            $table->json('geo_rules')->nullable();           // JSON allow/deny

            // Analytics
            $table->longText('tracking_code')->nullable();
            $table->json('ab_variants')->nullable();
            $table->json('conversion_goals')->nullable();

            // Additional Settings
            $table->string('layout')->default('default');
            $table->string('template_alt')->default('default');

            // Meta
            $table->text('revision_notes')->nullable();
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
