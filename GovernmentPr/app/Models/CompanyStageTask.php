<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStageTask extends Model
{
    use HasFactory;
    protected $table = 'company_stage_tasks';
    // The primary key for the table
    protected $primaryKey = 'stage_task_id';

    protected $fillable = [
        'company_id',
        'company_stage_id',
        'task_name',
        'description',
        'due_date',
        'priority',
        'status',
        'supervisor_ids',
        'task_tag_ids',
        'created_by', // User who created the task
        'guard', // Guard for the user who created the task
        'updated_by', // User who updated the task
        'updated_guard', // Guard for the user who updated the task
        'is_deleted', // Soft delete flag
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'supervisor_ids' => 'array',
        'task_tag_ids' => 'array',
        'due_date' => 'date',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];
    public $timestamps = true;
    protected $dates = ['due_date', 'started_at', 'completed_at'];
    /**
     * Define the relationships.
     */
    public function companyStage()
    {
        return $this->belongsTo(CompanyStage::class, 'company_stage_id', 'stage_id');
    }

    public function companyWorkflow()
    {
        return $this->belongsTo(CompanyWorkflow::class, 'workflow_id', 'workflow_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // The supervisor_ids are stored as JSON array in the database
    public function supervisors()
    {
        return $this->hasManyThrough(
            CompanyEmployees::class,
            null,
            null,
            null,
            null,
            null
        )->whereIn('id', $this->supervisor_ids ?? []);
    }
    // The task_tag_ids are stored as JSON array in the database
    public function taskTags()
    {
        return TaskTag::whereIn('id', $this->task_tag_ids ?? [])->get();
    }
}
