<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $primaryKey = 'policyID';
    protected $fillable = [
        'companyID',
        'policy_title',
        'created_at',
        'updated_at',
    ];
}
