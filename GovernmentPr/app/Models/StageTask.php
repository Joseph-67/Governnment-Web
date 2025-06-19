<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageTask extends Model
{
    use HasFactory;
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'name',
        'description',
        'stage_id',
        'company_id',
        'priority',
        'supervisorID',
        'due_date',
        'status',
        'sequence',
        'is_active',
        'is_deleted',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_deleted' => 'boolean',
        'due_date' => 'datetime',
    ];

    protected $dates = [
        'deleted_at',
    ];

    // Relationships
    public function stage()
    {
        return $this->belongsTo(CompanyStage::class, 'stage_id', 'stage_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
    public function supervisor()
    {
        return $this->belongsTo(HRMS\CompanyEmployees::class, 'supervisorID', 'EmployeeID');
    }
}
