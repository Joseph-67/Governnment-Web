<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLog extends Model
{
    use HasFactory;
    protected $table = 'production_logs';

    protected $primaryKey = 'production_log_id';

    protected $fillable = [
        'production_title',
        'company_operation_id',
        'material_log_data',
        'chemical_log_data',
        'company_id',
        'water_volume',
        'product_log_data',
        'calendar_year_id',
        'production_date',
        'production_status',
        'logged_at',
    ];
    public $timestamps = true;
    public function companyOperation()
    {
        return $this->belongsTo(CompanyOperation::class, 'company_operation_id', 'company_operation_id');
    }
    public function calendarYear()
    {
        return $this->belongsTo(CalendarYear::class, 'calendar_year_id', 'calendar_year_id');
    }
}
