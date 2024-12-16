<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_waste_reduction_measure extends Model
{
    use HasFactory;
    protected $table = "recp_waste_reduction_measures";
    protected $primaryKey = "wasteReductionID";
    protected $fillable = [
        'companyID',
        'waste_reduction_title',
        'status'
    ];
}