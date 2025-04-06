<?php

namespace App\Http\Controllers;
use App\Models\WasteDisposal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WasteDisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
            return view('company.companyProfile', $data);

      
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'waste_type' => 'required|string|max:255',
            'operation' => 'required|integer',
            'waste_item' => 'required|integer',
            'quantity_disposed' => 'required|numeric|min:0',
            'disposal_method' => 'required|string|max:255',
            'calendar_year' => 'required|integer',
            'disposal_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // If validation passes, create a new WasteDisposal record
        $wasteDisposal = WasteDisposal::create([
            'waste_type' => $request -> waste_type,
            'company_id' => $request->company_id,
            'operation_type_id' => $request ->operation,
            'company_waste_id' => $request->waste_item,
            'quantity' => $request->quantity_disposed,
            'disposal_method' => $request->disposal_method,
            'calendar_year_id' => $request->calendar_year,
            'disposal_date' => $request->disposal_date,
            'status' => 'active'
        ]);

        return response()->json([
           
            'status'=> 'success',
            'message' => 'Waste disposal record created successfully.',
            'data' => $wasteDisposal,
        ], 201);
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
