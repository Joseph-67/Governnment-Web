<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $primaryKey = 'tagID';

    protected $fillable = [
        'name',
        'slug',
    ];

    // Example relationship: A tag belongs to many posts
    public function posts()
    {   
        return $this->belongsToMany(Post::class);
    }
}
