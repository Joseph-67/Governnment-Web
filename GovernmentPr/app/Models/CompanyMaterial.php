<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Material;
class CompanyMaterial extends Model
{
    use HasFactory;
    protected $primaryKey="companyMaterialId";
    protected $fillable=[
        'companyID',
        'materialID',
        'serial_number',
        'unit_of_measure',
        'status'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
