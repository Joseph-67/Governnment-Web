<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\ProductionLog;
use App\Models\CompanyOperation;



class ProductionReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        $data['page_title'] = 'Production Report';
        $data['companies']  =   Company::where('status', 'active')->orderBy('company_name', 'ASC')->get();
        return view('components.reportinganalytics.production-report', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_report($selectedCompany, $selectedYear)
    {
        $data = [];
        try {
            $companyOperations = CompanyOperation::where('company_id', $selectedCompany)
            // ->where('calendar_year_id', $selectedYear)
            ->get();

            $operationIds = $companyOperations->pluck('company_operation_id');
            
            // Fetch production logs for the selected company and year
            $productionLogs = ProductionLog::whereIn('company_operation_id', $operationIds)
            ->where('calendar_year_id', $selectedYear)
            ->get(['production_log_id', 'company_operation_id', 'production_title', 'material_log_data', 'chemical_log_data', 'company_id', 'water_volume', 'product_log_data', 'calendar_year_id', 'production_date', 'production_status', 'logged_at']);

            $totalUnitsProduced = $productionLogs->sum(function ($log) {
            $productLogData = json_decode($log->product_log_data, true);
            $totalQuantity = 0;

            if (is_array($productLogData)) {
                foreach ($productLogData as $product) {
                $totalQuantity += isset($product['quantity']) ? (int)$product['quantity'] : 0;
                }
            }

            return $totalQuantity;
            });

            $totalUnitsProducedPerProduct = $productionLogs->reduce(function ($carry, $log) {
            $productLogData = json_decode($log->product_log_data, true);

            if (is_array($productLogData)) {
                foreach ($productLogData as $product) {
                $productId = $product['product_id'] ?? 'Unknown';
                $quantity = isset($product['quantity']) ? (int)$product['quantity'] : 0;

                if (!isset($carry[$productId])) {
                    $carry[$productId] = 0;
                }

                $carry[$productId] += $quantity;
                }
            }

            return $carry;
            }, []);

            $data['selectedCompany'] = $selectedCompany;
            $data['selectedYear'] = $selectedYear;
            $data['total_units_produced'] = $totalUnitsProduced;
            $data['total_units_produced_per_product'] = $totalUnitsProducedPerProduct;
            $data['status'] = 'success';
            $data['message'] = 'Production report generated successfully.';
        } catch (\Exception $e) {
            $data['status'] = 'error';
            $data['message'] = 'An error occurred while generating the production report: ' . $e->getMessage();
        }
        return response()->json($data);
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
