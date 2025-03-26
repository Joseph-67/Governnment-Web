<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarYear extends Model
{
    use HasFactory;
    protected $table = 'calendar_years';
    protected $primaryKey = 'calendar_year_id';
    protected $fillable = [
        'company_id',
        'name',
        'start_date',
        'end_date',
        'is_active',
        'is_delete',
    ];
    public $timestamps = true;
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
