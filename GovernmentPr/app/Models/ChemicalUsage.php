<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class ChemicalUsage extends Model
{
    use HasFactory;
    protected $primaryKey="usage_id";
    protected $fillable=[
        'chemical_id',
        'company_id',
        'quantity_used',
        'unit',
        'purpose',
        'usage_date',
        'created_at',
        'updated_at'
    ];
}
