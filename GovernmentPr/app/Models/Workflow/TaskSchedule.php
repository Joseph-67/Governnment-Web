<?php

namespace App\Models\Workflow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyStageTask;
use App\Models\Workflow\RecurrenceRule;

class TaskSchedule extends Model
{
    use HasFactory;
    protected $table = 'task_schedules';
    protected $primaryKey = 'task_schedule_id';
    protected $fillable = [
        'company_id',
        'task_id',
        'start_time',
        'end_time',
        'is_recurrence',
        'recurrence_rule_id',
        'status'
    ];
    
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_recurrence' => 'boolean',
        'status' => 'string'
    ];
    public function recurrenceRule()
    {
        return $this->belongsTo(RecurrenceRule::class, 'recurrence_rule_id', 'recurrence_rule_id');
    }
    public function task()
    {
        return $this->belongsTo(CompanyStageTask::class, 'task_id', 'stage_task_id');
    }
}
