<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChemicalStockMovement extends Model
{
    use HasFactory;
    protected $table = 'chemical_stock_movements';
    protected $primaryKey = 'chemicalStockID';
    protected $fillable = [
        'company_id',
        'company_chemical_id',
        'chemical_id',
        'batch_number',
        'production_batch_number',
        'transaction_type',
        'quantity',
        'unit',
        'source_location',
        'destination_location',
        'reason',
        'remark',
        'reference_id',
        'reference_type',
        'guard',
        'performed_by',
        'calendar_year',
        'transaction_date',
        'status',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public $timestamps = true;

    public function companyChemical()
    {
        return $this->belongsTo(CompanyChemical::class, 'company_chemical_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
