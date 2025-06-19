<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectives extends Model
{
    use HasFactory;
    protected $table = 'objectives';
    protected $primaryKey = 'objective_id';
    protected $fillable = [
        'name',
        'sequence_order',
        'created_by',
        'updated_by'
    ];

    
}
