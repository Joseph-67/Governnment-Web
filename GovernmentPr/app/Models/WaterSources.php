<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSources extends Model
{
    use HasFactory;
    protected $primaryKey = "WaterSourcesId";
    protected $fillable = [
        "label",
        "sources",
        "status",
    ];
    public $timestamps = true;
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function waterSourceDetails()
    {
        return $this->hasMany(WaterSourceDetails::class, 'WaterSources_id', 'WaterSourcesId');
    }
    public function companyWaterSources()
    {
        return $this->hasMany(CompanyWaterSources::class, 'WaterSources_id', 'WaterSourcesId');
    }
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
