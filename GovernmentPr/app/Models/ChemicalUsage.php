<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class ChemicalUsage extends Model
{
    use HasFactory;
    protected $primaryKey="materialID";
    protected $fillable=[
        'chemical',
        'chemical_name',
        'description',
        'status'
    ];
}
