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
}
