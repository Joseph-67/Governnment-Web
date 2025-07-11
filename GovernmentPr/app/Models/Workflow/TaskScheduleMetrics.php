<?php

namespace App\Models\Workflow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskScheduleMetrics extends Model
{
    use HasFactory;
    protected $table = 'task_schedule_metrics';

    protected $primaryKey = 'task_schedule_metric_id';

    protected $fillable = [
        'company_id',
        'task_schedule_id',
        'expected_chemical_quantity',
        'expected_material_quantity',
        'expected_water_quantity',
        'status',
    ];

     public function task()
    {
        return $this->belongsTo(TaskSchedule::class, 'task_schedule_id', 'task_schedule_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
