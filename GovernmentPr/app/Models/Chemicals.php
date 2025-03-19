<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemicals extends Model
{
    use HasFactory;
    protected $primaryKey="chemical_id";
    protected $fillable=[
        'name',
        'chemical_category',
        'chemical_image',
        'cas_number',
        'ec_number',
        'reach_registration_number',
        'ghs_classification',
        'description',
        'formula',
        'status'
    ];

    public function companyChemicals()
    {
        return $this->hasMany(CompanyChemical::class);
    }
}
