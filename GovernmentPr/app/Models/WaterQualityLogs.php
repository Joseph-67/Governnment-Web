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
        'parameter_tested',
        'ph_level',
        'turbidity',
        'contaminants',
        'test_results',
        'deviation_detected',
        'corrective_actions',
        'status',      
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
    
}
