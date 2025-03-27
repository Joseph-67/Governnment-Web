<?php

namespace App\Http\Controllers;

use App\Models\CompanyWaste;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyWasteController extends Controller
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
            'company_id' => 'required|integer',
            'waste_item_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('company_wastes', 'waste_name')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->input('company_id'));
                }),
            ],
            'waste_item_type' => 'required|string|max:50',
            'waste_item_unit' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status' => 'error',
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $companyWaste = new CompanyWaste();
            $companyWaste->company_id = $request->input('company_id');
            $companyWaste->waste_name = $request->input('waste_item_name');
            $companyWaste->unit = $request->input('waste_item_unit');
            $companyWaste->waste_type = $request->input('waste_item_type');
            $companyWaste->save();
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while creating the company waste.',
            'error' => $e->getMessage(),
            ], 500);
        }

        $activeWastes = CompanyWaste::where('is_delete', false)
            ->where('company_id', $request->input('company_id'))
            ->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Company waste created successfully.',
            'waste_items' => $activeWastes,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyWaste  $companyWaste
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyWaste $companyWaste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyWaste  $companyWaste
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyWaste $companyWaste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyWaste  $companyWaste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyWaste $companyWaste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyWaste  $companyWaste
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyWaste $companyWaste)
    {
        //
    }
}
