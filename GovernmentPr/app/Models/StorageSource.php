<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageSource extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'icon',
        'capacity'
    ];
}
