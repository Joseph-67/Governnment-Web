<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RECP_product_recovery_method extends Model
{
    use HasFactory;
    protected $table = "recp_product_recovery_methods";
    protected $primaryKey = "productRecoveryID";
    protected $fillable = [
        'companyID',
        'recovery_method_title',
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
