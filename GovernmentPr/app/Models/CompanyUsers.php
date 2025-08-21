<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class CompanyUsers extends Model
{
    use HasFactory;
    protected $table = 'company_users';
    protected $primaryKey = 'company_user_id';
    protected $fillable = [
        'company_id',
        'user_id',
        'status',
        'last_login_at'
    ];
    public $timestamps = true;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function countCompaniesForUser($userId)
    {
        return self::where('user_id', $userId)->count();
    }
    // Relationships
    public function companyRecp()
    {
        // Define the one-to-one relationship with the recp model
        return $this->hasOne(recp::class, 'company_id', 'company_id');
    }

    // Static Methods for Counting Companies
    public static function countCompaniesThisWeekForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->count();
    }

    // Static Methods for Audited Companies
    public static function AuditedCompaniesForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'approved');
            });
    }

    public static function DisapprovedCompaniesForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'disapproved');
            });
    }

    public static function PendingCompaniesForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'pending');
            });
    }

    // Static Methods for Audited Companies This Week
    public static function AuditedThisWeekForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'approved')
                      ->whereBetween('updated_at', [
                          now()->startOfWeek(),
                          now()->endOfWeek()
                      ]);
            });
    }

    public static function DisapprovedThisWeekForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'disapproved')
                      ->whereBetween('updated_at', [
                          now()->startOfWeek(),
                          now()->endOfWeek()
                      ]);
            });
    }

    public static function PendingThisWeekForUser($userId)
    {
        return self::where('user_id', $userId)
            ->whereHas('companyRecp', function ($query) {
                $query->where('status', 'pending')
                      ->whereBetween('updated_at', [
                          now()->startOfWeek(),
                          now()->endOfWeek()
                      ]);
            });
    }
    public static function getCompaniesWithStatusForUser($userId)
    {
        return self::with(['company', 'companyRecp'])
            ->where('user_id', $userId)
            ->get()
            ->map(function ($companyUser) {
                return [
                    'company_name' => optional($companyUser->company)->company_name,
                    'email' => optional($companyUser->company)->email,
                    'status' => optional($companyUser->companyRecp)->status ?? 'N/A',
                    'last_audited' => optional($companyUser->companyRecp)->updated_at ?? null,
                ];
            });
    }
                    public function scopeActiveUser($query)
        {
            // return $query->where('status', 'active');
        }
    public function isOnline(): bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    
    public function lastSeen()
    {
        return Cache::get('user-last-seen-' . $this->id);
    }

    public static function getCompaniesWithEfficiencyForUser($userId)
    {
        return self::with(['company', 'companyRecp'])
            ->where('user_id', $userId)
            ->get()
            ->map(function ($companyUser) {
                // Assuming efficiency is stored in the 'efficiency' column of recp table
                $efficiency = optional($companyUser->companyRecp)->efficiency ?? 0;
                return [
                    'company_id' => $companyUser->company_id,
                    'company_name' => optional($companyUser->company)->company_name,
                    'efficiency' => $efficiency,
                    'status' => optional($companyUser->companyRecp)->status ?? 'N/A',
                    'last_audited' => optional($companyUser->companyRecp)->updated_at ?? null,
                ];
            });
    }

    public static function getCompaniesWithWasteReductionForUser($userId)
{
    return self::with(['company'])
        ->where('user_id', $userId)
        ->get()
        ->map(function ($companyUser) {
            $companyId = $companyUser->company_id;

            // Total waste reduced for this company
            $totalWasteReduced = \App\Models\WasteReduction::getTotalWasteReducedByCompany($companyId);

            // Latest month’s waste reduction (optional, for trend tracking)
            $latest = \App\Models\WasteReduction::where('company_id', $companyId)
                ->orderByDesc('month')
                ->first();

            return [
                'company_name'      => optional($companyUser->company)->company_name,
                'total_waste'       => $totalWasteReduced,
                'latest_month'      => optional($latest)->month,
                'latest_waste'      => optional($latest)->waste_reduced ?? 0,
                'status'            => 'audited', // You can still use companyRecp if relevant
                'last_audited'      => optional($latest)->created_at ?? null,
            ];
        });
}


}