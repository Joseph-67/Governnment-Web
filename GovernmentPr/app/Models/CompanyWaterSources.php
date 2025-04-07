<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWaterSources extends Model
{
    use HasFactory;
    protected $primaryKey = 'CompanyWaterSourcesID';
    protected $fillable = [
        'companyID',
        'WaterSources_id',
    ];
    public $timestamps = true;
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyID', 'company_id');
    }
    public function waterSource()
    {
        return $this->belongsTo(WaterSources::class, 'WaterSources_id', 'WaterSourcesId');
    }
    public function waterSourceDetails()
    {
        return $this->hasMany(WaterSourceDetails::class, 'company_water_source_id', 'CompanyWaterSourcesID');
    }
    public function waterStockMovements()
    {
        return $this->hasMany(WaterStockMovement::class, 'water_source_id', 'CompanyWaterSourcesID');
    }
}
