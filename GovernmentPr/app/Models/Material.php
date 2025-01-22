<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stock_movement;

class Material extends Model
{
    use HasFactory;
    protected $primaryKey="materialID";
    protected $fillable=[
        'categoryID',
        'material',
        'material_name',
        'category',
        'description',
        'status'
    ];

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
