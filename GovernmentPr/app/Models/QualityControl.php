<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityControl extends Model
{
    use HasFactory;
    protected $table = 'quality_controls';
    protected $primaryKey = 'quality_control_id';
    protected $fillable = [
        'company_id',
        'quality_metric',
        'acceptable_range',
        'measurement_frequency',
        'responsible_person',
        'status'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
