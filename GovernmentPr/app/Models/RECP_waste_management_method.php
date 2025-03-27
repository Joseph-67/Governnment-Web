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

    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
