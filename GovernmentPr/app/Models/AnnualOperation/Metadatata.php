<?php

namespace App\Models\AnnualOperation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadatata extends Model
{
    use HasFactory;
    protected $table = 'annual_operation_metadata';

    protected $primaryKey = 'annual_op_metadata_ID';

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'OperationName',
        'year',
        'annual_no_of_operation',
        'PreparedBy',
        'DateCreated',
        'LastUpdated',
        'is_deleted',
        'Status',
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'DateCreated' => 'datetime',
        'LastUpdated' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'company_id');
    }

    public function calendarYear()
    {
        return $this->belongsTo(\App\Models\CalendarYear::class, 'year', 'calendar_year_id');
    }
}
