<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guard extends Model
{
    use HasFactory;
    protected $table = 'guards';
    protected $primaryKey = 'guard_id';
    protected $fillable = [
        'title',
        'status',
        'created_at',
        'updated_at',
    ];
}
