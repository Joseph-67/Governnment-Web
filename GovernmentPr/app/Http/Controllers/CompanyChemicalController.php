<?php

namespace App\Http\Controllers;

use App\Models\CompanyChemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyChemicalController extends Controller
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

    public function store_company_chemical(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'chemical_id' => 'required|integer|unique:company_chemicals,company_id',
            'unit_of_measurement' => 'required|string',
        ],[
            'chemical_id.unique' => "Chemical has already been added."
        ]);

        // Return validation errors if any
        if ($validatedData->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validatedData->errors(),
            ], 422);
        }

        $companyChemical = new CompanyChemical();
        $companyChemical->company_id = $request['company_id'];
        $companyChemical->chemical_id = $request['chemical_id'];
        $companyChemical->unit = $request['unit_of_measurement'];
        $companyChemical->status = "active";
        $companyChemical->is_deleted = FALSE;
        $companyChemical->save();

        $company_chemicals = CompanyChemical::join('chemicals', 'chemicals.chemical_id', '=', 'company_chemicals.chemical_id')->
        where('company_chemicals.is_deleted', false)->get(['company_chemicals.chemical_id as id', 'name', 'formula', 'unit', 'company_chemicals.status as chemical_status', 'company_chemical_id']);
        return response()->json([
            'status'  => 'success',
            'message' => 'Chemical recorded successfully.',
            'data'    => $company_chemicals
        ]);
    }

    public function check_in_chemical(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'chemical_id' => 'required|integer',
        ]);

        // Return validation errors if any
        if ($validatedData->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validatedData->errors(),
            ], 422);
        }

        $companyChemical = CompanyChemical::where('company_id', $request['company_id'])
            ->where('chemical_id', $request['chemical_id'])
            ->first();

        if (!$companyChemical) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Chemical not found for the specified company.',
            ], 404);
        }

        $companyChemical->status = "active";
        $companyChemical->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Chemical checked in successfully.',
            'data'    => $companyChemical
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function show($chemical)
    {
        //
        $data['CompanyChemical'] = CompanyChemical::where('company_chemical_id', $chemical)->first();
        return view('components.chemical.view-chemical', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function edit($chemical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chemical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy($chemical)
    {
        //
    }
}
