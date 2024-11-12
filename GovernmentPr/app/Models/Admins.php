<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';
    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'email',
        'password',
        'mobile_number',
        'profile_photo_path',
        'status'
    ];
}
