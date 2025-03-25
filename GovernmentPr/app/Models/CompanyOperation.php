<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOperation extends Model
{
    use HasFactory;
    protected $table = 'company_operations';

    protected $primaryKey = 'company_operation_id';

    protected $fillable = [
        'operation_name',
        'description',
        'operation_code',
        'operation_type',
        'operation_category',
        'operation_unit',
        'operation_unit_price',
        'operation_unit_cost',
        'operation_unit_time',
        'company_id',
        'status',
        'expected_waste_per_operation',
        'expected_water_usage_per_operation',
        'expected_unit_produced_for_goods'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
