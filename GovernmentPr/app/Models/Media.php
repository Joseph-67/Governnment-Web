<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'original_name',
        'path',
        'url',
        'mime_type',
        'size',
        'storage_source',
        'category_id',
        'guard',
        'uploaded_by'
    ];
}