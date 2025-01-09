<?php

namespace App\Http\Controllers;

use App\Models\AddEvent;
use Illuminate\Http\Request;

class AddEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('components.CMS.Event.add-event');
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
        $request->validate([
            'title'         => 'required|max:255',
            'url'           => 'nullable',
            'content'       => 'required|max:255',
            'post_date'     => 'required|date_format:dd/mm/yy',
            'StartDate'     => 'required|date_format:dd/mm/yy',
            'EndDate'       => 'required|date_format:dd/mm/yy',
            'description'   => 'required|max:255',
            'category'      => 'required|max:255',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddEvent  $addEvent
     * @return \Illuminate\Http\Response
     */
    public function show(AddEvent $addEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddEvent  $addEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(AddEvent $addEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddEvent  $addEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddEvent $addEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddEvent  $addEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddEvent $addEvent)
    {
        //
    }
}
