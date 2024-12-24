<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RECPHistory;
use App\Models\RECP_areas_of_benefit;
use App\Models\RECP_human_and_environmental_health_benefit;
use App\Models\RECP_innovation_areas;
use App\Models\RECP_areas_of_improvement;
use App\Models\RECP_harzardous_materials;
use App\Models\RECP_house_keep_practice;
use App\Models\RECP_unit_of_process;
use App\Models\RECP_problem_and_solution;
use App\Models\RECP_waste_management_method;
use App\Models\RECP_waste_reduction_measure;
use App\Models\RECP_product_recovery_method;
use App\Models\Policy;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RECPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // utmost benefit
    public function add_utmost_benefit(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'areas_of_company_benefit'  =>  ['nullable', 'string', Rule::unique('recp_areas_of_benefits', 'benefit_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        // dd($request->all());
        RECP_areas_of_benefit::create([
            'companyID' => $request['company'],
            'benefit_title' => $request['areas_of_company_benefit']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Area of benefit to company added successfully.',
            'areas_of_company_benefit' => $request->areas_of_company_benefit
        ]);
    }

    public function remove_utmost_benefit(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'areas_of_company_benefit' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_areas_of_benefit::where('companyID', $request->company)
        ->where('benefit_title',$request->areas_of_company_benefit)
        ->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Area of benefit removed successfully.',
            'areas_of_company_benefit' => $request->areas_of_company_benefit
        ]);
    }

    // environmental and health benefit
    public function add_environmental_benefit(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company'                     =>  ['required', 'numeric'],
            'enviromental_benefit_title'  =>  ['nullable', 'string', Rule::unique('recp_human_and_environmental_health_benefits', 'environmental_benefit_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        // dd($request->all());
        RECP_human_and_environmental_health_benefit::create([
            'companyID' => $request['company'],
            'environmental_benefit_title' => $request['enviromental_benefit_title']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Human and environmental health benefit added successfully.',
            'enviromental_benefit_title' => $request->areas_of_company_benefit
        ]);
    }

    public function remove_environmetal_benefit(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'enviromental_benefit_title' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_human_and_environmental_health_benefit::where('companyID', $request->company)
        ->where('environmental_benefit_title',$request->enviromental_benefit_title)
        ->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Human and environmental health benefit removed successfully.',
            'environmental_benefit_title' => $request->enviromental_benefit_title
        ]);
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
