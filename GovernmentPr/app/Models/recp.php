<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recp extends Model
{
    use HasFactory;
    protected $primaryKey = 'recp_id'; // Primary key for the recps table
    protected $fillable = [
        'company_id',
        'status', 
        'remark', 
    ];
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'approved');
    }

    public static function totalRegisteredCompanies()
    {
        return self::active()->distinct('company_id')->count('company_id');
    }

    
    public static function totalRegisteredCompaniesThisWeek()
    {
        return self::active()
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->distinct('company_id')
            ->count('company_id');
    }

    public function scopeNonCompliant($query)
    {
        return $query->where('status', 'disapproved');
    }

    public static function totalDisapprovedCompanies()
    {
        return self::nonCompliant()->distinct('company_id')->count('company_id'); // BEGIN: Improved method call
    }

    public static function totalDisapprovedCompaniesThisWeek()
    {
        return self::nonCompliant() // BEGIN: Improved method call
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->distinct('company_id')
            ->count('company_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public static function totalPendingCompanies()
    {
        return self::pending()->distinct('company_id')->count('company_id'); // BEGIN: Improved method call
    }

    public static function totalPendingCompaniesThisWeek()
    {
        return self::pending() // BEGIN: Improved method call
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->distinct('company_id')
            ->count('company_id');
    }

}
