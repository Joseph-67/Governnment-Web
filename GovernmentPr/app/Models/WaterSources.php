<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSources extends Model
{
    use HasFactory;
    protected $primaryKey = "WaterSourcesId";
    protected $fillable = [
        "label",
        "sources",
        "status",
    ];
}
