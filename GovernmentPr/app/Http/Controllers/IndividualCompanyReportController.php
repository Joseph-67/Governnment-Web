<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyMaterial;
use App\Models\stock_movement;
use App\Models\CompanyUsers;

class IndividualCompanyReportController extends Controller
{
public function index($user)
{
    $user = decrypt($user);

    // All companies this user is assigned to (pluck company models)
    $userCompanies = CompanyUsers::where('user_id', $user)
        ->with('company')
        ->get()
        ->map(fn($cu) => $cu->company);

    if ($userCompanies->isEmpty()) {
        return back()->with('error', 'No companies assigned to this user.');
    }

    // Selected company from request (fallback = first assigned company)
    $selectedCompany = request('company') ?? ($userCompanies->first()->company_id ?? null);

    // Ensure the selected company belongs to the user; else fallback to first
    $allowedCompanyIds = $userCompanies->pluck('company_id')->all();
    if (!in_array($selectedCompany, $allowedCompanyIds)) {
        $selectedCompany = $userCompanies->first()->company_id;
    }

    // Company Materials (for detailed report) — using Eloquent so Blade can access relations
    // Make sure CompanyMaterial model defines 'company' and 'material' relations
    $company_materials = \App\Models\CompanyMaterial::with(['company', 'material'])
        ->where('companyID', $selectedCompany)
        ->get();

    // Recent Restocking
    $recentRestocking = DB::table('stock_movements')
        ->join('company_materials', 'stock_movements.companyMaterialId', '=', 'company_materials.companyMaterialId')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
        ->where('stock_movements.movement_type', 'in')
        ->where('companies.company_id', $selectedCompany)
        ->select(
            'companies.company_id',
            'companies.company_name',
            'materials.material',
            'stock_movements.quantity',
            'stock_movements.created_at'
        )
        ->orderByDesc('stock_movements.created_at')
        ->limit(30)
        ->get();

    // Stock Withdrawals
    $stockWithdrawals = DB::table('stock_movements')
        ->join('company_materials', 'stock_movements.companyMaterialId', '=', 'company_materials.companyMaterialId')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
        ->where('stock_movements.movement_type', 'out')
        ->where('companies.company_id', $selectedCompany)
        ->select(
            'companies.company_id',
            'companies.company_name',
            'materials.material',
            'stock_movements.quantity',
            'stock_movements.created_at'
        )
        ->orderByDesc('stock_movements.created_at')
        ->limit(30)
        ->get();

    // Low Stock Alerts (calculated from stock_movements)
    $lowStockAlerts = DB::table('company_materials')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
        ->leftJoin('stock_movements', 'company_materials.companyMaterialId', '=', 'stock_movements.companyMaterialId')
        ->select(
            'companies.company_id',
            'companies.company_name',
            'materials.material',
            'company_materials.threshold_quantity',
            DB::raw("COALESCE(SUM(CASE WHEN stock_movements.movement_type = 'in' THEN stock_movements.quantity ELSE 0 END),0) -
                     COALESCE(SUM(CASE WHEN stock_movements.movement_type = 'out' THEN stock_movements.quantity ELSE 0 END),0) as current_quantity")
        )
        ->where('companies.company_id', $selectedCompany)
        ->groupBy(
            'companies.company_id',
            'companies.company_name',
            'materials.material',
            'company_materials.threshold_quantity'
        )
        ->havingRaw('current_quantity < company_materials.threshold_quantity')
        ->get();

    return view('components.reportinganalytics.individual-company-report', [
        'userCompanies'    => $userCompanies,
        'selectedCompany'  => $selectedCompany,
        'recentRestocking' => $recentRestocking,
        'stockWithdrawals' => $stockWithdrawals,
        'lowStockAlerts'   => $lowStockAlerts,
        'company_materials'=> $company_materials,
    ]);
}


}
