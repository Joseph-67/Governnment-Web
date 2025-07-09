<?php

namespace App\Models\Workflow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEmployee extends Model
{
    use HasFactory;
    protected $table = 'task_employees';
    protected $primaryKey = 'task_employee_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'company_id',
        'task_id',
        'employee_id',
        'status',
        'comments',
        'assigned_at',
    ];

    public function task()
    {
        return $this->belongsTo(CompanyStageTask::class, 'task_id', 'stage_task_id');
    }

    public function employee()
    {
        return $this->belongsTo(CompanyEmployee::class, 'employee_id', 'EmployeeID');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
