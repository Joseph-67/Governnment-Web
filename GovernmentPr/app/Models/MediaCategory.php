<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'description'
    ];

    // A category has many media files
    public function media()
    {
        return $this->hasMany(Media::class, 'category_id');
    }
}
