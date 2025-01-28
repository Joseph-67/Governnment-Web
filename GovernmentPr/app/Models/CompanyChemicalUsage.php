<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyChemicalUsage extends Model
{
    use HasFactory;
    protected $primaryKey="chemicalID";
    protected $fillable=[
        'chemical',
        'chemical_name',
        'unit_of_measurement',
        'status'
    ];
}
