<?php

namespace App\Http\Controllers;

use App\Models\ChemicalUsage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ChemicalUsageController extends Controller
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
        $data['chemical'] = ChemicalUsage::get();
        return view('components.chemical.create-chemical', $data);
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
        $request->validate([
            'chemical_name'             => 'required|max:255|unique:chemical_usages,chemical',
            'unit_of_measurement'       => 'nullable|max:255'
        ]);

        $chemical = new chemicalUsage();

        $chemical -> chemical               =   $request-> chemical_name;
        $chemical -> unit_of_measurement    =   $request-> unit_of_measurement;
        $chemical -> status         =   "1";
        $chemical -> save();

        return back()->with(['success' => 'Chemical added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChemicalUsage  $chemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function show(ChemicalUsage $chemicalUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChemicalUsage  $chemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(ChemicalUsage $chemicalUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChemicalUsage  $chemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChemicalUsage $chemicalUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChemicalUsage  $chemicalUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChemicalUsage $chemicalUsage)
    {
        //
    }
}
