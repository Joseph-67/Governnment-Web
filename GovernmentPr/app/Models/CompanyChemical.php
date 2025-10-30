<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyChemical extends Model
{
    use HasFactory;
    protected $primaryKey="company_chemical_id";
    protected $fillable=[
        'company_id',
        'chemical_id',
        'quantiy_per_unit',
        'unit',
        'minimum_threshold',
        'maximum_threshold',
        'storage_location',
        'status',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function chemical()
    {
        return $this->belongsTo(Chemicals::class, 'chemical_id', 'chemical_id');
    }

    public function stockMovements()
    {
        return $this->hasMany(ChemicalStockMovement::class, 'company_chemical_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    public function scopeByCompany($query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function scopeByChemical($query, $chemical_id)
    {
        return $query->where('chemical_id', $chemical_id);
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

    public function scopeTotalChemicals()
    {
        return $query->count();
    }
}
