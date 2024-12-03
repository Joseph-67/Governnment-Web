<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_harzardous_materials extends Model
{
    use HasFactory;
    protected $table = "recp_harzardous_materials";
    protected $primaryKey = "hazarduousMaterialID";
    protected $fillable = [
        'companyID',
        'material_title',
        'status'
    ];
}
