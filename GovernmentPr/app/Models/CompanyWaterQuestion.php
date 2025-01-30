<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWaterQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'companyWaterQuestionID';
    protected $fillable = [
        'companyID',
        'questionID',
        'created_at',
        'updated_at',
    ];
}
