<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterStockMovement extends Model
{
    use HasFactory;
    protected $primaryKey = 'water_stock_movement_id';
    public $timestamps = true;
    protected $table = 'water_stock_movements';
    protected $fillable = [
        'water_source_id',
        'company_id',
        'movement_type',
        'volume',
        'calendar_year_id',
        'movement_date',
        'remark',
        'status',
    ];

    public function scopeCompanyWaterSource($query, $companyId, $waterSourceId)
    {
        return $query->where('company_id', $companyId)
                     ->where('water_source_id', $waterSourceId);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
