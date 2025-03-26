<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_innovation_areas extends Model
{
    use HasFactory;
    protected $table = "recp_innovation_areas";
    protected $primaryKey = "innovationAreaID";
    protected $fillable = [
        'companyID',
        'innovation_area_title',
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
