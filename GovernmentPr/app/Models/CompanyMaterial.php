<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Material;
class CompanyMaterial extends Model
{
    use HasFactory;
    protected $primaryKey="companyMaterialId";
    protected $fillable=[
        'companyID',
        'materialID',
        'serial_number',
        'unit_of_measure',
        'threshold_quantity',
        'status'
    ];

    public function stockMovements()
    {
        return $this->hasMany(stock_movement::class, 'companyMaterialId');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'materialID', 'materialID');
    }

    public static function totalMaterials()
    {
        return self::where('status', 'active')->count();
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyID', 'company_id');
    }
    
}
