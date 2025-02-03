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
        // dd($user->notifications->toArray());
        // dd(Auth::user());
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
        $validator = Validator::make($request->all(), [
            'recipients'   => 'required|json',
            'subject'      => 'required|string|max:255|min:3',
            'message'      => 'required|string|min:3',
            'cc'           => 'nullable|json',
            'bcc'          => 'nullable|json',
            'files.*'      => 'file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ]);
        }
    
        // Handle files
        $uploadedFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $uploadedFiles[] = $this->UploadAnyFile($file, "EmailFiles");
            }
        }
    
        // Process base64 images (captured photos) with custom names
        $uploadedImages = [];
        // dd($request);
        if (!empty($request->images)) {
            # code...
            foreach ($request->images as $key => $value) {
                // dd($value);
                if (strpos($key, 'image') === 0) {
                    if (is_string($value) && preg_match('/^data:image\/(\w+);base64,/', $value)) {
                        try {
                            $imageData = explode(',', $value)[1]; // Extract base64 content
                            $imageName = 'uploads/image_' . uniqid() . '.png';
                            Storage::disk('public')->put($imageName, base64_decode($imageData));
                            $uploadedImages[] = asset('storage/' . $imageName);
                        } catch (\Exception $e) {
                            return response()->json(['error' => 'Error processing image.'], 400);
                        }
                    } else {
                        return response()->json(['error' => 'Invalid image format.'], 400);
                    }
                }
            }
        }    
        // Recipient handling
        // Parse recipients, cc, and bcc
        $recipients = json_decode($request->recipients, true);
        $cc = json_decode($request->cc, true) ?? [];
        $bcc = json_decode($request->bcc, true) ?? [];

        $recipientEmails = array_column($recipients, 'email');
        $ccEmails = array_column($cc, 'email');
        $bccEmails = array_column($bcc, 'email');

        // Prepare data for notification
        $data = [
            'subject' => $request->subject,
            'body'    => $request->message,
            'attachments' => array_merge($uploadedFiles, $uploadedImages), // Combine all file URLs
            'cc'      => $ccEmails,
            'bcc'     => $bccEmails,
        ];
        // dd($data['attachments']);
        try {
            //code...
            foreach ($recipients as $key => $recipient) {
                # code...
                switch ($recipient['role']) {
                    case 'admin':
                        # code...
                        $user = Admins::where('email', $recipient['email'])->first();
                        if ($user) {
                            Notification::send($user, new MessageApp($data));
                        }
                        break;
                    case 'user':
                        # code...
                        $user = User::where('email', $recipient['email'])->first();
                        if ($user) {
                            Notification::send($user, new MessageApp($data));
                        }
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            
            return response()->json([
                'status' => 'success',
                'message' => 'Message sent successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            
            return response()->json([
                'status' => 'error',
                'message' => 'Message not sent!',
            ]);
        }

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
