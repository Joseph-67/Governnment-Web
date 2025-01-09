<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock_movement extends Model
{
    use HasFactory;
    protected $table="stock_movements";
    protected $primaryKey="stockID";
    protected $fillable=[
        'companyMaterialId',
        'company_id',
        'movement_type',
        'quantity',
        'calendar_year',
        'movement_date',
        'remark',
        'status'
    ];
}
