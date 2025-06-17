<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWorkflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'workflow_id';

    protected $fillable = [
        'company_id',
        'workflow_name',
        'description',
        'created_by',
        'guard',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
