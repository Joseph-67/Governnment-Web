<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IotDevice extends Model
{
    use HasFactory;
    protected $table = 'iot_devices';
    protected $primaryKey = 'iot_device_id';
    protected $fillable = [
        'device_name',
        'company_id',
        'device_location',
        'status',
        'last_maintenance_date'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
