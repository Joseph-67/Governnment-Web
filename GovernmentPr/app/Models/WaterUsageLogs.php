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
    
}
