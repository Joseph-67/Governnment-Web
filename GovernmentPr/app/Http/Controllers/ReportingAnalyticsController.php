<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyMaterial;
use App\Models\stock_movement;

class ReportingAnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['page_title'] = "Reporting & Analytics";
        $data['page_description'] = "Reporting & Analytics";
        $data['breadcrumb'] = [
            ['title' => 'Reporting & Analytics', 'path' => '/reporting-analytics', 'icon' => 'fa fa-dashboard', 'active' => 0, 'is_module' => 1]
        ];

        $data['total_company_materials'] = CompanyMaterial::totalMaterials();
        $data['company_materials'] = CompanyMaterial::with([
            'company:company_id,company_name',
            'material:materialID,material'
        ])
        ->select('companyMaterialId', 'companyID', 'materialID', 'unit_of_measure', 'threshold_quantity')
        ->get();


        $data['topMaterials'] = CompanyMaterial::with('material:materialID,material')
    ->join('stock_movements', 'company_materials.companyMaterialId', '=', 'stock_movements.companyMaterialId')
    ->where('stock_movements.movement_type', 'out') // only track materials that were used
    ->select(
        'company_materials.materialID',
        DB::raw('SUM(stock_movements.quantity) as total_used')
    )
    ->groupBy('company_materials.materialID')
    ->orderByDesc('total_used')
    ->take(5)
    ->get();
    // Monthly Material Usage Statistical Analysis
    $monthlyUsage = DB::table('stock_movements')
        ->join('company_materials', 'stock_movements.companyMaterialId', '=', 'company_materials.companyMaterialId')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
        ->where('stock_movements.movement_type', 'out')
        ->select(
        DB::raw('YEAR(stock_movements.created_at) as year'),
        DB::raw('MONTH(stock_movements.created_at) as month'),
        'companies.company_name',
        'materials.material',
        DB::raw('SUM(stock_movements.quantity) as total_used')
        )
        ->groupBy('year', 'month', 'companies.company_name', 'materials.material')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

    // Total units used (all time)
    $totalUnitsUsed = DB::table('stock_movements')
        ->where('movement_type', 'out')
        ->sum('quantity');

    // Per company, per material, total used (all time)
    $companyMaterialUsage = DB::table('stock_movements')
        ->join('company_materials', 'stock_movements.companyMaterialId', '=', 'company_materials.companyMaterialId')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
        ->where('stock_movements.movement_type', 'out')
        ->select(
        'companies.company_name',
        'materials.material',
        DB::raw('SUM(stock_movements.quantity) as total_used')
        )
        ->groupBy('companies.company_name', 'materials.material')
        ->orderBy('companies.company_name')
        ->orderByDesc('total_used')
        ->get();

    $data['monthlyUsage'] = $monthlyUsage;
    $data['totalUnitsUsed'] = $totalUnitsUsed;
    $data['companyMaterialUsage'] = $companyMaterialUsage;

    // Fetch recent usage logs (last 30 records)
    $data['usageLogs'] = \App\Models\stock_movement::with([
        'companyMaterial.company:company_id,company_name',
        'companyMaterial.material:materialID,material'
        ])
        ->where('movement_type', 'out')
        ->orderByDesc('created_at')
        ->take(30)
        ->get()
        ->map(function ($movement) {
        return (object)[
            'date' => $movement->created_at,
            'company' => $movement->companyMaterial->company ?? null,
            'material' => $movement->companyMaterial->material ?? null,
            'quantity_used' => $movement->quantity,
        ];
        });
        $data['recentRestocking'] = DB::table('stock_movements')
            ->join('company_materials', 'stock_movements.companyMaterialId', '=', 'company_materials.companyMaterialId')
            ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
            ->join('materials', 'company_materials.materialID', '=', 'materials.materialID')
            ->where('stock_movements.movement_type', 'in')
            ->select(
                'companies.company_name',
                'materials.material',
                'stock_movements.quantity',
                'stock_movements.created_at'
            )
            ->orderByDesc('stock_movements.created_at')
            ->limit(30)
            ->get()
            ->groupBy('company_name');
            
            

        return view('components.reportinganalytics.reportinganalytics', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
