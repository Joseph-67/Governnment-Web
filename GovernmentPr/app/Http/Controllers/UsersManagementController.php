<?php

namespace App\Http\Controllers;

use App\Models\usersManagement;
use App\Models\AdminManagement;
use Illuminate\Http\Request;

class UsersManagementController extends Controller
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

    public function getAllUsers()
    {
        $usersDetails = usersManagement::all();
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
            'firstname'     => 'required|max:255',   
            'lastname'      => 'required|max:255',   
            'othername'     => 'nullable|max:255',
            'email'         => ['required', 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/'],
            'mobileNumber'  => ['required', 'regex:/^[\+]?[0-9]{1,4}[-\s]?[0-9]{1,4}[-\s]?[0-9]{1,4}$/']

        ]);
       usersManagement::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'othername'=>$request->othername,
            'email'=>$request->email,
            'mobileNumber'=>$request->mobileNumber
        ]);
        AdminManagement::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'othername'=>$request->othername,
            'email'=>$request->email,
            'mobileNumber'=>$request->mobileNumber
        ]);

       
      

        return back()->with(['success' => 'Added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function show(usersManagement $usersManagement)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(usersManagement $usersManagement)
    {
        //
    }

    public function show_usersmanagement() {
        return view('components.admin.users-management');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usersManagement $usersManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usersManagement  $usersManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(usersManagement $usersManagement)
    {
        //
    }
}
