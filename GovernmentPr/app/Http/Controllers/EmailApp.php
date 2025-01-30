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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Image\ImageController;

class EmailApp extends ImageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       

        $user = Auth::user();
        $data['notifications'] = $user->notifications;
       return view('components/admin/email-app', $data);
    }

    public function fetch_users()
    {
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
        $validator =Validator::make($request->all(),[
            'recipients'   =>   'required|array',
            'recipients.*' =>   'required|email',
            'subject'      =>   'required|string|max:255|min:3',
            'message'      =>   'required|string|min:3',
            'cc'           =>   'nullable|array',
            'cc.*'         =>   'nullable|email',
            'bcc'          =>   'nullable|array',
            'bcc.*'        =>   'nullable|email',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:2048'
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        // Handle text input
        $text = $request->input('text');

        // Handle file uploads
        $uploadedFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $this->UploadAnyFile($file, "EmailFiles");
            }
        }

        // Handle base64 encoded images (from captured photos)
        $uploadedImages = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'image') === 0) {
                $imageData = explode(',', $value)[1];
                $imageName = 'uploads/' . uniqid() . '.png';
                Storage::disk('public')->put($imageName, base64_decode($imageData));
                $uploadedImages[] = $imageName;
            }
        }

        // return response()->json([
        //     'message' => 'Message received successfully',
        //     'text' => $text,
        //     'files' => $uploadedFiles,
        //     'images' => $uploadedImages
        // ], 200);

        $user = Admins::where('email', $request['recipients_email'])->first();
            // Check if user exists
                if (!$user) {
                    return response()->json([
                        'error' => 'Recipient not found'
                    ], 404);
                }
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
