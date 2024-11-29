<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addPost extends Model
{
    use HasFactory; 
    protected $table="general_settings";
    protected $primaryKey='settings_id';
    protected $fillable=[     
        'title', 
        'tag',
        'category', 
        'author' ,
        'date' ,
        'status'
];
}
