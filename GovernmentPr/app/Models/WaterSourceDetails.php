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
        'WaterSources_id',
        'location',
        'capacity',
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
