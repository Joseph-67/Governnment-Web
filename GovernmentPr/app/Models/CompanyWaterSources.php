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
}
