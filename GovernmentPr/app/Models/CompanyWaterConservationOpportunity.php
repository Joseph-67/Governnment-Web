<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWaterConservationOpportunity extends Model
{
    use HasFactory;
    protected $primaryKey = 'opportunityID';
    protected $fillable = [
        'companyID',
        'conservation_id',
        'created_at',
        'updated_at',
    ];
}
