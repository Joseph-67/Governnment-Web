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

    protected $casts = [
        'material_log_data' => 'array',
        'chemical_log_data' => 'array',
        'product_log_data' => 'array',
        'production_date' => 'datetime',
        'logged_at' => 'datetime',
    ];

    /**
     * Relationship with the CompanyOperation model.
     */
    public function companyOperation()
    {
        return $this->belongsTo(CompanyOperation::class, 'company_operation_id');
    }

    /**
     * Relationship with the Company model.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Relationship with the CalendarYear model.
     */
    public function calendarYear()
    {
        return $this->belongsTo(CalendarYear::class, 'calendar_year_id');
    }

    /**
     * Access product details stored in product_log_data.
     *
     * @return object|null
     */
    public function getProductAttribute()
    {
        return $this->product_log_data ? (object) $this->product_log_data : null;
    }

}
