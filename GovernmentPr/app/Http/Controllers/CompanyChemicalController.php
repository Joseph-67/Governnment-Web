<?php

namespace App\Http\Controllers;

use App\Models\CompanyChemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\ChemicalStockMovementController;
use Carbon\Carbon;

class CompanyChemicalController extends ChemicalStockMovementController
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

    public function getCompanyChemicals($companyId)
    {
        try {
            // Fetch company chemicals with relationships
            $companyChemicals = CompanyChemical::with(['chemical', 'company'])
                ->active()
                ->byCompany($companyId)
                ->where('is_deleted', false)
                ->get()
                ->map(function ($chem) {
                    return [
                        'id' => $chem->company_chemical_id,
                        'name' => optional($chem->chemical)->name ?? 'N/A',
                        'type' => optional($chem->chemical->chemicalCategory)->category_name ?? 'N/A',
                        'quantity' => $chem->quantity_per_unit ?? 0,
                        'unit' => $chem->unit ?? '-',
                        'reorder_level' => $chem->minimum_threshold ?? '-',
                        'safety_level' => $chem->maximum_threshold ?? '-',
                        'hazardous' => $chem->is_hazardous ? 
                            '<span class="badge bg-danger">Yes</span>' : 
                            '<span class="badge bg-success">No</span>',
                        'storage_location' => $chem->storage_location ?? '-',
                        'updated_at' => $chem->updated_at 
                            ? Carbon::parse($chem->updated_at)->diffForHumans() 
                            : '-',
                    ];
                });

            return response()->json([
                'status' => 'success',
                'company_chemicals' => $companyChemicals,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch company chemicals.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
            'chemical' => ['required', 'integer',Rule::unique('company_chemicals', 'chemical_id')->where(function ($query) use ($request) {
                return $query->where('company_id', $request['company_id']);
            })],
            'quantity_per_unit' => 'required|string',
            'unit_of_measurement' => 'required|string',
            'hazardous' => 'nullable|boolean',
            'storage_location' => 'nullable|string',
            'reorder_level' => 'nullable',
            'safety_stock' => 'nullable',
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
        $companyChemical->chemical_id = $request['chemical'];
        $companyChemical->quantity_per_unit = $request['quantity_per_unit'];
        $companyChemical->unit = $request['unit_of_measurement'];
        $companyChemical->minimum_threshold = $request['reorder_level'];
        $companyChemical->maximum_threshold = $request['safety_stock'];
        $companyChemical->storage_location = $request['storage_location'];
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
        $chemicalStockMovementController = new ChemicalStockMovementController();
        $data['availableChemicalBalance'] = $chemicalStockMovementController->getChemicalBalance($chemical);
        $data['availableChemicalInflowBalance'] = $chemicalStockMovementController->getTotalCheckIn($chemical);
        $data['availableChemicalOutflowBalance'] = $chemicalStockMovementController->getTotalCheckOut($chemical);
        $data['availableChemicalAdjustmentBalance'] = $chemicalStockMovementController->getTotalAdjustment($chemical);
        $data['CompanyChemical'] = CompanyChemical::where('company_chemical_id', $chemical)->first();
        $data['transactions'] = CompanyChemical::where('company_chemical_id', $chemical)->get();
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
