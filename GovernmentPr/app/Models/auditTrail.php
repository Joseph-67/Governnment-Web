<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditTrail extends Model
{
    use HasFactory;
    protected $table = 'audit_trails';
    protected $primaryKey = 'audit_trail_id';
    protected $fillable = [
        'record_type',
        'record_id',
        'action_type',
        'previous_value',
        'new_value',
        'performed_by',
        'ip_address',
        'user_agent',
        'reason',
        'geolocation',
        'company_id'
    ];
    protected $casts = [
        'previous_value' => 'array',
        'new_value' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'performed_by', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
