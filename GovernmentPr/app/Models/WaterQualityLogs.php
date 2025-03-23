<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQualityLogs extends Model
{
    use HasFactory;
    protected $table = 'water_quality_logs';
    protected $primaryKey = 'quality_id';
    protected $fillable = [
        'companyID',
        'test_date',
        'ph_level',
        'turbidity',
        'contaminants',
        'test_results',
        'status',      

    ];
}
