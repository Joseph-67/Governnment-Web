<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

use Illuminate\Http\Request;

class viewEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($email)
{
    $data['emailID'] = decrypt($email);
    
    return view('components.admin.view-email', $data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
    
        // Retrieve the notification from the database
        $notification = DatabaseNotification::where('id', $id)
            ->where('notifiable_id', Auth::id()) // Ensure it's for the logged-in user
            ->first();
    
        // Handle case where notification does not exist
        if (!$notification) {
            abort(404, 'Notification not found.');
        }
    
        // Mark the notification as read
        $notification->markAsRead();
    
        // Pass the notification to the view
        return view('components.admin.view-email', ['notification' => $notification]);
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
