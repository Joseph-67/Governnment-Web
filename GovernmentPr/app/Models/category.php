<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $primaryKey="categoryID";
    protected $fillable=[
        'categoryID',
        'category_name',
        'category_description'
    ];
}
