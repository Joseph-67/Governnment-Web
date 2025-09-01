<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPageCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'page_id',
        'category_id',
    ];

    public function page()
    {
        return $this->belongsTo(CmsPage::class, 'page_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
