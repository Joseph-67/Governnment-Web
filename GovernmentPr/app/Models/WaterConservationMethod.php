<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterConservationMethod extends Model
{
    use HasFactory;
    protected $primaryKey = "WaterConservationMethodId";
    protected $fillable = [
        "label",
        "method",
        "status",
    ];
}
