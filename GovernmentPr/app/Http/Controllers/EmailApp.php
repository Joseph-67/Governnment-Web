<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admins;
use App\Models\NotificationConfig;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MessageApp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EmailApp extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       

        // $user = User::first();
        // Notification::send($user, new SystemNotification);
       return view('components/admin/email-app');
    }

    public function fetch_users()
    {
        //
        // dd($query);
        $data['items']= Admins::get();
        return response()->Json($data, 200);
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
        // dd($request);

            $request->validate([
                'reciepients_email'=> 'required',
                'subject'          => 'required',
                'message'          => 'required'
            ]);
            $user = Admins::where('email', $request['reciepients_email'])->first();
            $data = [
                // 'notification_id'   =>  $request->email_apps,
                'subject'           =>  $request->subject,
                'body'              =>  $request->message
            ];
            Notification::send($user, new MessageApp($data));
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
