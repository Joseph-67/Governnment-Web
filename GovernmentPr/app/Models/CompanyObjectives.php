<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyObjectives extends Model
{
    use HasFactory;
    protected $primaryKey = 'companyobjectiveID';
    protected $fillable = [
        'companyID',
        'objective_id',
        'created_at',
        'updated_at',
    ];
}
