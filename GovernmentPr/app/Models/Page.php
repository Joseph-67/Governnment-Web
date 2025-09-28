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
        'excerpt',
        'body',

        // Status & scheduling
        'status',
        'published_at',
        'expires_at',

        // Visibility & access
        'visibility',
        'visibility_password',
        'visibility_roles',

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

        // Media
        'featured_image',
        'hero_image',
        'image_slider',
        'gallery',

        // Layout Section
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_url',
        'template',
        'layout_style',
        'sidebar_widgets',
        'footer_widgets',

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
        'goals',
    ];

    protected $casts = [
        // JSON fields
        'image_slider'     => 'array',
        'gallery'          => 'array',
        'custom_css'  => 'string',
        'custom_js'   => 'string',
        'custom_head' => 'string',
        'custom_body' => 'string',

        'visibility_roles' => 'array',
        'categories'       => 'array',
        'tags'             => 'array',
        'revision_notes'   => 'array',
        'analytics'        => 'array',
        'ab_tests'         => 'array',
        'goals'            => 'array',
        'sidebar_widgets'  => 'array',
        'footer_widgets'   => 'array',

        // Dates
        'published_at'     => 'datetime',
        'expires_at'       => 'datetime',

        // Booleans
        // 'is_private'       => 'boolean',
    ];

    protected $attributes = [
        'status' => 'draft',
        // 'is_private' => false,
        
        'template' => 'fullwidth',
        'layout_style' => 'default',
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
