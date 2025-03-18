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
        'unit',
        'status',
        'is_deleted',
        'created_at',
        'updated_at'
    ];
}
