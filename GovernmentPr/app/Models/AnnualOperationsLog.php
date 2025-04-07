<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualOperationsLog extends Model
{
    use HasFactory;
    protected $table = 'annual_operations_logs';
    protected $primaryKey = 'annual_operations_log_id';
    protected $fillable = [
        'operation_name',
        'company_operation_id',
        'calendar_year_id',
        'companyMaterialId',
        'company_waste_id',
        'company_chemical_id',
        'product_id',
        'company_id',
        'expected_quantity',
        'expected_quantity_chemical',
        'operations_per_year',
        'water_used_per_year',
        'units_produced_per_year',
        'quantity_of_waste',
        'status'
    ];
    protected $casts = [
        'companyMaterialId' => 'array',
        'company_waste_id' => 'array',
        'company_chemical_id' => 'array',
        'product_id' => 'array',
        'expected_quantity' => 'array',
        'expected_quantity_chemical' => 'array',
        'quantity_of_waste' => 'array',
    ];
}
