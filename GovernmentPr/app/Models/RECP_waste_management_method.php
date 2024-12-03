<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_waste_management_method extends Model
{
    use HasFactory;
    protected $table = "recp_waste_management_methods";
    protected $primaryKey = "wasteManagementID";
    protected $fillable = [
        'companyID',
        'management_method_title',
        'status'
    ];
}
