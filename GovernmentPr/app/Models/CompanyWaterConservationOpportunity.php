<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWaterConservationOpportunity extends Model
{
    use HasFactory;
    protected $primaryKey = 'CompanyWaterConservationOpportunityID';
    protected $fillable = [
        'companyID',
        'waterConservationMethod_id',
        'created_at',
        'updated_at',
    ];
}
