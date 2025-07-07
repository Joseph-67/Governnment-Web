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
        'description',
        'sequence_order',
        'start_date',
        'end_date',
        'status'
    ];
}
