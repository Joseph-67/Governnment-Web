<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_innovation_areas extends Model
{
    use HasFactory;
    protected $table = "recp_innovation_areas";
    protected $primaryKey = "innovationAreaID";
    protected $fillable = [
        'companyID',
        'innovation_area_title',
        'status'
    ];
}
