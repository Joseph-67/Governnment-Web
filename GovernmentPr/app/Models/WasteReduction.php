<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteReduction extends Model
{
    use HasFactory;

    protected $table = 'waste_reductions';

    protected $fillable = [
        'company_id',
        'month',
        'waste_reduced',
    ];

    protected $casts = [
        'waste_reduced' => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Query Helpers
    |--------------------------------------------------------------------------
    */

    // Get waste reduction for a specific company + month
    public static function getWasteReductionByCompanyAndMonth($companyId, $month)
    {
        return self::where('company_id', $companyId)
            ->where('month', $month)
            ->first();
    }

    // Get total waste reduced for a company across all time
    public static function getTotalWasteReducedByCompany($companyId)
    {
        return self::where('company_id', $companyId)->sum('waste_reduced');
    }

    // Get all companies' waste reduction for a specific month
    public static function getWasteReductionByMonth($month)
    {
        return self::where('month', $month)->get();
    }

    // Get total waste reduction by user across all companies they manage
    public static function getTotalWasteReducedByUser($userId)
    {
        return self::whereHas('company.companyUsers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->sum('waste_reduced');
    }

    // Get monthly trend for a company (for line charts)
    public static function getMonthlyTrendByCompany($companyId)
    {
        return self::where('company_id', $companyId)
            ->orderBy('month')
            ->pluck('waste_reduced', 'month');
    }

    // Get monthly trend for all companies managed by a user
    public static function getMonthlyTrendByUser($userId)
    {
        return self::whereHas('company.companyUsers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->selectRaw('month, SUM(waste_reduced) as total_reduction')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total_reduction', 'month');
    }
}
