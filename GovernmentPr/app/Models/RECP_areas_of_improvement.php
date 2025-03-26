<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_areas_of_improvement extends Model
{
    use HasFactory;
    protected $table = "recp_areas_of_improvements";
    protected $primaryKey = "improvementAreaID";
    protected $fillable = [
        'companyID',
        'area_title',
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
