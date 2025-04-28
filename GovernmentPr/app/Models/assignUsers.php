<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignUsers extends Model
{
    use HasFactory;
    protected $table = 'assign_users';
    protected $primaryKey = 'assign_user_id';
    protected $fillable = [
        'company_id',
        'users',
    ];
   
   
}
