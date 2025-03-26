<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterUsageLogs extends Model
{
    use HasFactory;
    protected $primaryKey = 'WaterUsageLogsID';
    protected $fillable = [
        'companyID',
        'WaterSourcesId',
        'quantity_used',
        'unit_of_water_measured',
        'date',
        'purpose'
    ];
    public $timestamps = true;
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function waterSources()
    {
        return $this->belongsTo(WaterSources::class);
    }
}
