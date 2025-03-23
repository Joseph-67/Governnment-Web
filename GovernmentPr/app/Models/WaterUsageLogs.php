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
        'WaterSources_id',
        'WaterUsage',
        'quantity_used',
        'unit',
        'usage_date',
        'purpose'
    ];
    
}
