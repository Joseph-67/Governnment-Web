<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionBatchTracking extends Model
{
    use HasFactory;
    protected $table = 'production_batch_tracking';
    protected $primaryKey = 'batch_id';
    protected $fillable = [
        'batch_name',
        'company_id',
        'product_id',
        'start_date',
        'end_date',
        'total_quantity',
        'defective_quantity',
        'yield_percentage',
        'created_by',
        'geolocation',
        'iot_device_id',
        'status',
    ];
  
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function auditTrail()
    {
        return $this->belongsTo(AuditTrail::class, 'audit_trail_id');
    }

    public function iotDevice()
    {
        return $this->belongsTo(IoTDevice::class, 'iot_device_id');
    }
}
