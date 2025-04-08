<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteDisposal extends Model
{
    use HasFactory;
    protected $table = 'waste_disposals';
    protected $primaryKey = 'waste_disposal_id';

    protected $fillable = [
        'waste_type',
        'operation_id',
        'company_id',
        'quantity',
        'disposal_method',
        'calendar_year_id',
        'disposal_date',
        'company_waste_id',
        'status'
    ];

    public function operation()
    {
        return $this->belongsTo(CompanyOperation::class, 'operation_id', 'company_operation_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function calendarYear()
    {
        return $this->belongsTo(CalendarYear::class, 'calendar_year_id');
    }

    public function companyWaste()
    {
        return $this->belongsTo(CompanyWaste::class, 'company_waste_id');
    }
  
}
