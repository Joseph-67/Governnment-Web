<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;

class Admins extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard = 'admin';
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'email',
        'password',
        'mobile_number',
        'profile_photo_path',
        'status',
        'last_login_at', // ✅ Add this
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    public function scopeActiveAdmin($query)
    {
        return $query->where('status', 'active')
                     ->where('updated_at', '>=', Carbon::now()->subMinutes(30));
    }

    public function isOnline(): bool
    {
        return Cache::has('admin-is-online-' . $this->id);
    }
    
    public function lastSeen()
    {
        return Cache::get('admin-last-seen-' . $this->id);
    }

}
