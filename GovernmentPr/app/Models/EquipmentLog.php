<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentLog extends Model
{
    use HasFactory;
    protected $table = 'equipment_logs';

    protected $primaryKey = 'equipment_log_id';

    protected $fillable = [
        'company_id',
        'equipment_name',
        'equipment_code',
        'equipment_capacity',
        'equipment_type_id',
        'equipment_model',
        'equipment_serial_number',
        'equipment_brand',
        'equipment_location',
        'equipment_image',
        'equipment_color',
        'equipment_size',
        'equipment_weight',
        'equipment_condition',
        'equipment_warranty',
        'equipment_maintenance_schedule',
        'equipment_maintenance_status',
        'equipment_maintenance_notes',
        'equipment_maintenance_date',
        'equipment_maintenance_cost',
        'equipment_maintenance_provider',
        'equipment_maintenance_contact',
        'equipment_maintenance_phone',
        'equipment_maintenance_email',
        'description',
        'equipment_status',
        'purchase_date',
        'is_deleted',
        'logged_at',
    ];

    protected $guarded = ['equipment_log_id'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'logged_at',
        'purchase_date',
    ];
    protected $casts = [
        'equipment_log_id' => 'integer',
        'equipment_type_id' => 'integer',
        'is_deleted' => 'boolean',
        'logged_at' => 'datetime',
    ];

    protected $attributes = [
        'is_deleted' => false,
        'equipment_condition' => 'good',
        'equipment_status' => 'active',
    ];

    // Scope to filter by equipment type
    public function scopeOfType($query, $typeId)
    {
        return $query->where('equipment_type_id', $typeId);
    }

    // Scope to filter by equipment status
    public function scopeOfStatus($query, $status)
    {
        return $query->where('equipment_status', $status);
    }

    // Scope to filter by equipment condition
    public function scopeOfCondition($query, $condition)
    {
        return $query->where('equipment_condition', $condition);
    }

    // Scope to filter by deleted status
    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', false);
    }

    // Scope to filter by maintenance status
    public function scopeMaintenanceStatus($query, $status)
    {
        return $query->where('equipment_maintenance_status', $status);
    }

    // Scope to filter by date range
    public function scopeLoggedBetween($query, $startDate, $endDate)
    {
        return $query->whereBetween('logged_at', [$startDate, $endDate]);
    }

    // Scope to filter by location
    public function scopeOfLocation($query, $location)
    {
        return $query->where('equipment_location', $location);
    }

    // Scope to filter by warranty status
    public function scopeUnderWarranty($query)
    {
        return $query->whereNotNull('equipment_warranty');
    }

    // Relationship with EquipmentType
    public function equipmentType()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id', 'equipment_type_id');
    }

}
