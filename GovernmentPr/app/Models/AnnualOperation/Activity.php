<?php

namespace App\Models\AnnualOperation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';

    protected $primaryKey = 'ActivityID';

    protected $fillable = [
        'LogID',
        'ActivityName',
        'OperationTypeId',
        'ActivityStartDate',
        'ActivityEndDate',
        'Objective',
        'Description',
        'MaterialUsage',
        'ChemicalUsage',
        'WaterUsage',
        'Priority',
        'Tags',
        'ExternalReference',
        'is_deleted',
    ];

    protected $casts = [
        'MaterialUsage' => 'array',
        'ChemicalUsage' => 'array',
        'Tags' => 'array',
        'ActivityStartDate' => 'date',
        'ActivityEndDate' => 'date',
        'WaterUsage' => 'decimal:2',
        'is_deleted' => 'boolean',
    ];

    public $timestamps = true;

    // Relationships

    // Example: An Activity belongs to an OperationType
    public function operationType()
    {
        return $this->belongsTo(OperationType::class, 'OperationTypeId');
    }

    // Example: An Activity belongs to a Log
    public function log()
    {
        return $this->belongsTo(Log::class, 'LogID');
    }

    // Example: An Activity has many Tasks
    public function tasks()
    {
        return $this->hasMany(Task::class, 'ActivityID');
    }

    // Example: An Activity may have many Comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'ActivityID');
    }

    // Example: An Activity may have many Attachments
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'ActivityID');
    }
}
