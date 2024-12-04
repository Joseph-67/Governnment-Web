<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_areas_of_benefit extends Model
{
    use HasFactory;
    protected $table = "recp_areas_of_benefits";
    protected $primaryKey = "areaBenefitID";
    protected $fillable = [
        'companyID',
        'benefit_title',
        'status'
    ];
}
