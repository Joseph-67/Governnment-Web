<?php

namespace App\Models\Workflow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurrenceRule extends Model
{
    use HasFactory;
    protected $table = 'recurrence_rules';
    protected $primaryKey = 'recurrence_rule_id';
    protected $fillable = [
        'company_id',
        'frequency',
        'interval',
        'start_date',
        'end_date',
        'by_day',   
        'by_month',
        'count',
        'is_active'
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'by_day' => 'array',
        'by_month' => 'array',
        'is_active' => 'boolean'
    ];
    public function taskSchedules()
    {
        return $this->hasMany(TaskSchedule::class, 'recurrence_rule_id', 'recurrence_rule_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
