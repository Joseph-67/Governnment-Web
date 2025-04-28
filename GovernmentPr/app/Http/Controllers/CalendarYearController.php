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

    public function get_years($value)
    {
        $calendar_years = CalendarYear::where('is_delete', false)->where('company_id', $value)->get(['calendar_year_id', 'name']);
        return response()->json([
                    'status' => 'success',
                    'calendar_years' => $calendar_years
                ], 200);
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
            'company_id' => 'required|integer',
            'calendar_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('calendar_years', 'name')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->input('company_id'));
                }),
            ],
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
            'name' => $request->input('calendar_name'),
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

        $calendar_years = CalendarYear::where('is_delete', false)->get(['calendar_year_id', 'name', 'start_date', 'end_date', 'is_active']);
        return response()->json([
            'status' => 'success',
            'message' => 'Calendar Year created successfully.',
            'calendar_years' => $calendar_years
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
