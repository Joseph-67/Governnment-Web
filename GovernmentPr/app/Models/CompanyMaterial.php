<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMaterial extends Model
{
    use HasFactory;
    protected $primaryKey = "companyMaterialId";
    protected $fillable = [
        'companyID',
        'materialID',
        'quantity_per_unit',
        'unit',
        'minimum_threshold',
        'maximum_threshold',
        'storage_location',
        'hazardous',
        'status',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyID', 'company_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'materialID', 'materialID');
    }

    public function stockMovements()
    {
        return $this->hasMany(stock_movement::class, 'companyMaterialId');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    public function scopeByCompany($query, $company_id)
    {
        return $query->where('companyID', $company_id);
    }

    public function scopeByMaterial($query, $material_id)
    {
        return $query->where('material_id', $material_id);
    }

    public function scopeByYear($query, $year)
    {
        return $query->whereYear('created_at', $year);
    }

    public function scopeByMonth($query, $month)
    {
        return $query->whereMonth('created_at', $month);
    }

    public function scopeByDate($query, $date)
    {
        return $query->whereDate('created_at', $date);
    }

    public function scopeTotalMaterials()
    {
        return $query->count();
    }
}
