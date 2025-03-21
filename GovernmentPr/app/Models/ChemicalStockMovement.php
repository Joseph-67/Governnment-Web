<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChemicalStockMovement extends Model
{
    use HasFactory;
    protected $table = 'chemical_stock_movements';
    protected $primaryKey = 'stockID';
    protected $fillable = [
        'company_chemical_id',
        'chemical_id',
        'company_id',
        'movement_type',
        'quantity',
        'calendar_year',
        'movement_date',
        'remarks',
        'status',
    ];

    public $timestamps = true;

    public function companyChemical()
    {
        return $this->belongsTo(CompanyChemical::class, 'company_chemical_id');
    }
}
