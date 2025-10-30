<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsTag extends Model
{
    use HasFactory;
    protected $primaryKey = 'tag_id';
    protected $fillable = [
        'name',
    ];
    public function posts()
    {
        return $this->belongsToMany(CmsPost::class, 'cms_post_tags', 'tag_id', 'post_id');
    }
    function pages()
    {
        return $this->belongsToMany(CmsPage::class, 'cms_page_tags', 'tag_id', 'page_id');
    }
}
