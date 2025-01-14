<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaterial;
use App\Models\MaterialPrice;
use App\Models\Company;
use App\Models\category;
use App\Models\Material;
use Illuminate\Http\Request;

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
       
        $id = decrypt($id);
        $data['prices'] = MaterialPrice::latest('created_at')->first();
        $data['Material'] = material::join('categories', 'categories.categoryID', '=', 'materials.categoryID')->select('materialID', 'material', 'description','status', 'category_name')->get();
        return view('components.materials.view-material', $data)->with(['companyMaterialId' => $id]);
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
