<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaterial;
use App\Models\MaterialPrice;
use App\Models\Company;
use App\Models\category;
use App\Models\Material;
use App\Models\stock_movement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class CompanyMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMovements(Request $request)
{
    $query = $request->query('query');
    $company = $request->query('company');

    $movements = stock_movement::where('companyMaterialId', $company);

    switch ($query) {
        case 'today':
            $movements->whereDate('movement_date', Carbon::today());
            break;
        case 'last_week':
            $movements->whereBetween('movement_date', [Carbon::now()->subWeek(), Carbon::now()]);
            break;
        case 'last_month':
            $movements->whereBetween('movement_date', [Carbon::now()->subMonth(), Carbon::now()]);
            break;
        case 'this_year':
            $movements->whereYear('movement_date', Carbon::now()->year);
            break;
    }

    return response()->json($movements->get());
}
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'companyID'         =>  ['required', 'numeric'],
            'material'          =>  ['required', 'numeric', Rule::unique('company_materials', 'materialID')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['companyID']);
            })],
            'serial_number'   =>  ['nullable', 'string'],
            'unit_of_measurement' => ['nullable', 'string']
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = CompanyMaterial::create([
            'companyID'         => $request['companyID'],
            'materialID'        => $request['material'],
            'serial_number'     => $request['serial_number'],
            'unit_of_measure'   => $request['unit_of_measurement'],
        ]);

    
        if ($result) {
            # code...
            $companyMaterial  = CompanyMaterial::where('companyID', $request['companyID'])
            ->join('materials', 'materials.materialID', '=', 'company_materials.materialID')
            ->where('company_materials.status', 'active')
            ->select('*', 'materials.materialID as material_id', 'company_materials.materialID as materialID', 'company_materials.status as company_material_status', 'materials.status as material_status')
            ->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Material added successfully.',
                'company_material' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    public function store_price(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'companyMaterialID' =>  ['required', 'numeric'],
            'unit' =>  ['required', 'numeric'],
            'price' =>  ['required', 'numeric'],
            'date' =>  ['nullable', 'date'],
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = MaterialPrice::create([
            'companyMaterialID'  => $request['companyMaterialID'],
            'units'  => $request['unit'],
            'price'  => $request['price'],
            'date'   => $request['date'],
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Material price added successfully.',
                // 'company_material_price' => $companyMaterial,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Material price failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
        // $id = decrypt($id);
        // dd($id);
        $data['companyMaterialID'] = $id;
        $data['prices'] = MaterialPrice::where('companyMaterialId', $id)->latest('created_at')->first();
        $data['price_history'] = MaterialPrice::where('companyMaterialId', $id)->get();
        $data['material'] = CompanyMaterial::join('materials', 'materials.materialID', '=', 'company_materials.materialID')
        ->join('companies', 'company_materials.companyID', '=', 'companies.company_id')
        ->select('company_materials.materialID', 'material', 'description','company_materials.status', 'serial_number', 'unit_of_measure', 'company_name', 'industry', 'country', 'state')
        ->where('company_materials.companyMaterialId', $id)->first();
        $data['stockMovement'] = stock_movement::join('materials', 'materials.materialID', '=', 'stock_movements.materialID')
        ->where('companyMaterialId', $id)->get(['*', 'stock_movements.materialID as stk_move_material_id']);
        // dd($id);
        // $data['availableBalance'] = $this->getBalance($id['companyMaterialId']);
        
        return view('components.materials.view-material', $data)->with(['companyMaterialId' => $id]);
    }
    public function getTotalCheckIn($companyMaterialId)
    {
        //
        $totalCheckIn = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'in')->sum('quantity');
        return $totalCheckIn;
    }

    public function getTotalTransfer($companyMaterialId)
    {
        //
        $totalTransfer = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'transfer')->sum('quantity');
        return $totalTransfer;
    }

    public function getTotalAdjustment($companyMaterialId)
    {
        //
        $totalAdjustment = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'adjustment')->sum('quantity');
        return $totalAdjustment;
    }

    public function getTotalCheckOut($companyMaterialId)
    {
        //
        $totalCheckOut = stock_movement::where('companyMaterialId', $companyMaterialId)
        ->where('movement_type', 'out')->sum('quantity');
        return $totalCheckOut;
    }

    public function getBalance($companyMaterialId) {
        $balance = $this->getTotalCheckIn($companyMaterialId) - $this->getTotalTransfer($companyMaterialId) + $this->getTotalAdjustment($companyMaterialId) - $this->getTotalCheckOut($companyMaterialId);
        return $balance; 
    }
       
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyMaterial $companyMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyMaterial $companyMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyMaterial  $companyMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyMaterial $companyMaterial)
    {
        //
    }
}
