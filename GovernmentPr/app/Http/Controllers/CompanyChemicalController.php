<?php

namespace App\Http\Controllers;

use App\Models\CompanyChemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
            'chemical_id' => 'required|integer',
            'unit' => 'required|numeric',
        ]);

        // Return validation errors if any
        if ($validatedData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $companyChemical = new CompanyChemical();
        $companyChemical->company_id = $validatedData['company_id'];
        $companyChemical->chemical_id = $validatedData['chemical_id'];
        $companyChemical->unit = $validatedData['unit'];
        $companyChemical->status = "active";
        $companyChemical->is_deleted = FALSE;
        $companyChemical->save();

        return response()->json([
            'success' => true,
            'message' => 'Chemical usage recorded successfully.',
            'data'      => $companyChemical
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyChemicalUsage $companyChemicalUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyChemicalUsage $companyChemicalUsage)
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
    public function update(Request $request, CompanyChemicalUsage $companyChemicalUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyChemicalUsage  $companyChemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyChemicalUsage $companyChemicalUsage)
    {
        //
    }
}
