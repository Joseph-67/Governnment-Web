<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterStockMovement extends Model
{
    use HasFactory;
    protected $primaryKey = 'waterStockID';
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
        'recycle_method',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function companyWaterSources()
    {
        return $this->belongsTo(CompanyWaterSources::class, 'water_source_id', 'CompanyWaterSourcesID');
    }

    public function calendarYear()
    {
        return $this->belongsTo(CalendarYear::class, 'calendar_year_id');
    }
}
