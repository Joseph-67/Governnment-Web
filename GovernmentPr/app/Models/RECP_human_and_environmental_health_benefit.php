<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_human_and_environmental_health_benefit extends Model
{
    use HasFactory;
    protected $table = "recp_human_and_environmental_health_benefits";
    protected $primaryKey = "enviromentalBenefitID";
    protected $fillable = [
        'companyID',
        'environmental_benefit_title',
        'status'
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
