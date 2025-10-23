<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'menu_order',
        'excerpt',
        'body',

        // Status & scheduling
        'status',
        'publish_at',
        'expire_at',

        // Visibility & access
        'visibility',
        'visibility_password',
        'visibility_roles',
        'visible_roles',
        'device_visibility',
        'geo_rules',

        // Relationships
        'parent_id',
        'author_id',

        // SEO
        'seo_title',
        'seo_description',
        'seo_keywords',
        'canonical_url',
        'robots_index',
        'robots_follow',

        // Open Graph & Twitter
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',

        // Media & sliders
        'featured_image',
        'hero_bg',
        'image_slider',
        'gallery_images',
        'enable_slider',
        'slider_images',
        'reusable_components',

        // Layout Section
        'hero_bg',
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_url',
        'template',
        'template_alt',
        'layout_style',
        'layout',
        'sidebar_widgets',
        'footer_widgets',
        'enable_slider',

        // Contact / Forms / Newsletter
        'contact_form_enabled',
        'contact_form_email',
        'contact_form_subject',
        'contact_form_fields',
        'newsletter_enabled',
        'newsletter_provider',

        // Interactions & dynamic content
        'polls_surveys',
        'dynamic_tables',
        'conditional_logic',
        'embed_code',

        // Customization
        'custom_css',
        'custom_js',
        'custom_head',
        'custom_body',

        // Metadata
        'categories',
        'tags',
        'revision_notes',

        // Analytics & A/B Testing
        'analytics',
        'ab_tests',
        'ab_variants',
        'goals',
        'conversion_goals',
        'tracking_code',
    ];

    protected $casts = [
        // JSON fields
        'image_slider'        => 'array',
        'gallery_images'      => 'array',
        'slider_images'       => 'array',
        'reusable_components' => 'array',
        'contact_form_fields' => 'array',
        'visibility_roles'    => 'array',
        'visible_roles'       => 'array',
        'categories'          => 'array',
        'tags'                => 'array',
        'revision_notes'      => 'array',
        'analytics'           => 'array',
        'ab_tests'            => 'array',
        'ab_variants'         => 'array',
        'goals'               => 'array',
        'conversion_goals'    => 'array',
        'sidebar_widgets'     => 'array',
        'footer_widgets'      => 'array',
        'polls_surveys'       => 'array',
        'dynamic_tables'      => 'array',
        'conditional_logic'   => 'array',
        'device_visibility'   => 'array',
        'geo_rules'           => 'array',

        // Long text / HTML embeds
        'embed_code'          => 'string',
        'tracking_code'       => 'string',
        'custom_css'          => 'string',
        'custom_js'           => 'string',
        'custom_head'         => 'string',
        'custom_body'         => 'string',

        // Dates
        'publish_at'        => 'datetime',
        'expire_at'          => 'datetime',
        'created_at'          => 'datetime',
        'updated_at'          => 'datetime',
        'deleted_at'          => 'datetime',

        // Booleans / tinyint flags
        'enable_slider'       => 'boolean',
        'contact_form_enabled'=> 'boolean',
        'newsletter_enabled'  => 'boolean',
    ];

    protected $attributes = [
        'status' => 'draft',
        'template' => 'fullwidth',
        'layout_style' => 'default',
        'layout' => 'default',
        'template_alt' => 'default',
        'enable_slider' => false,
        'contact_form_enabled' => false,
        'newsletter_enabled' => false,
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Boot Methods (Slug Handling + Soft Deletes)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = static::generateUniqueSlug($page->title);
            }
        });

        static::updating(function ($page) {
            if ($page->isDirty('title') && !$page->isDirty('slug')) {
                $page->slug = static::generateUniqueSlug($page->title);
            }

        });

        static::deleting(function ($page) {
            if ($page->isForceDeleting()) {
                $page->children()->forceDelete();
            } else {
                $page->children()->delete();
            }
        });
    }

    private static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled')
            ->where('published_at', '>', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }


    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    public function getHeroImageUrlAttribute()
    {
        return $this->hero_image ? asset('storage/' . $this->hero_image) : null;
    }
}
