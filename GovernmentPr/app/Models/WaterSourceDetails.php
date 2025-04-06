<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSourceDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'water_source_detail_ID';
    protected $fillable = [
        'companyID',
        'company_water_source_id',
        'location',
        'capacity',
        'is_deleted'
    ];
    public $timestamps = true;
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyID', 'company_id');
    }

    public function companyWaterSources()
    {
        return $this->belongsTo(CompanyWaterSources::class, 'company_water_source_id', 'CompanyWaterSourcesID');
    }
    public function scopeIsDeleted($query, $isDeleted = true)
    {
        return $query->where('is_deleted', $isDeleted);
    }
}
