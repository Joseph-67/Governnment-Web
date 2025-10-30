<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name',
    ];
    public function posts()
    {
        return $this->hasMany(CmsPost::class, 'category_id', 'category_id');
    }
    function pages()
    {
        return $this->belongsToMany(CmsPage::class, 'cms_page_categories', 'category_id', 'page_id');
    }
}
