<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_water_usage extends Model
{
    use HasFactory;
    protected $primaryKey="companyWaterUsageID";
    protected $fillable=[
        'companyID',
        'volume',
        'date_type',
        'date',
        'remark'
    ];
}
