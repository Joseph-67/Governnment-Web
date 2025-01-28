<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Material;
class stock_movement extends Model
{
    use HasFactory;
    protected $table="stock_movements";
    protected $primaryKey="stockID";
    protected $fillable=[
        'companyMaterialId',
        'materialID',
        'companyID',
        'movement_type',
        'quantity',
        'calendar_year',
        'movement_date',
        'remark',
        'status'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
