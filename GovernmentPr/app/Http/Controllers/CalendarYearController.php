<?php

namespace App\Http\Controllers;

use App\Models\CalendarYear;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CalendarYearController extends Controller
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
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $calendarYear = CalendarYear::create([
            'company_id' => $request->input('company_id'),
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
            'status' => 'error',
            'message' => 'Failed to create Calendar Year.',
            'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Calendar Year created successfully.',
            'data' => $calendarYear
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalendarYear  $calendarYear
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarYear $calendarYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalendarYear  $calendarYear
     * @return \Illuminate\Http\Response
     */
    public function edit(CalendarYear $calendarYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalendarYear  $calendarYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalendarYear $calendarYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalendarYear  $calendarYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarYear $calendarYear)
    {
        //
    }
}
