<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',

        // Media
        'featured_image',
        'hero_image',
        'image_slider',
        'gallery',

        // SEO
        'seo_title',
        'seo_description',
        'seo_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'canonical_url',
        'robots',

        // Customization
        'custom_css',
        'custom_js',
        'custom_head',
        'custom_body',

        // Access & scheduling
        'is_private',
        'password',
        'visibility_roles',
        'published_at',
        'expires_at',
        'status',

        // Metadata
        'author_id',
        'categories',
        'tags',
        'revision_notes',

        // Analytics
        'analytics',
        'ab_tests',
        'goals',
    ];

    protected $casts = [
        'image_slider'     => 'array',
        'gallery'          => 'array',
        'custom_css'       => 'array',
        'custom_js'        => 'array',
        'custom_head'      => 'array',
        'custom_body'      => 'array',
        'visibility_roles' => 'array',
        'categories'       => 'array',
        'tags'             => 'array',
        'revision_notes'   => 'array',
        'analytics'        => 'array',
        'ab_tests'         => 'array',
        'goals'            => 'array',
        'published_at'     => 'datetime',
        'expires_at'       => 'datetime',
        'is_private'       => 'boolean',
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

    /*
    |--------------------------------------------------------------------------
    | Boot Methods (slug auto-generation)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title) . '-' . Str::random(6);
            }
        });
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
}
