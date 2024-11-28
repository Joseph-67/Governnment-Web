<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyObjectives extends Model
{
    use HasFactory;
    protected $primaryKey = 'objectiveID';
    protected $fillable = [
        'companyID',
        'objective_title',
        'created_at',
        'updated_at',
    ];
}
