<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPageTag extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'page_id',
        'tag_id',
    ];
    public function page()
    {
        return $this->belongsTo(CmsPage::class, 'page_id');
    }
    public function tag()
    {
        return $this->belongsTo(CmsTag::class, 'tag_id');
    }
}
