<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\MediaCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['media'] = Media::latest()->paginate(10);
        $data['categories'] = MediaCategory::withCount('media')->get();
        return view('components.CMS.media.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly uploaded media file in storage.
     */
    public function store(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,gif,svg,pdf,doc,docx,mp4,mov,avi',
            'category' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store file in storage/app/public/media
            $filePath = $file->storeAs('media', $fileName, 'public');

            // Save file info to DB
            $media = Media::create([
                'original_name' => $file->getClientOriginalName(),
                'path' => $filePath,
                'url' => Storage::url($filePath),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'category' => $request->category,
                'uploaded_by' => Auth::id(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'File uploaded successfully',
                'media' => $media
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Delete the file from storage
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        // Delete the record from database
        $media->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'File deleted successfully'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            Media::whereIn('media_id', $ids)->delete();
            return response()->json(['status' => 'success', 'message' => 'Files deleted successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'No files selected']);
    }

    /**
     * Common upload handler
     */
    private function handleUpload(Request $request, $disk = 'public')
    {
        // dd($request);
        // Validate file
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,gif,svg,pdf,doc,docx,mp4,mov,avi',
            'category' => 'nullable|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Unique filename
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Store file on selected disk
            $filePath = $file->storeAs('media', $fileName, $disk);
            $fileUrl = Storage::disk($disk)->url($filePath);

            // Save metadata in DB
            $media = Media::create([
                'original_name' => $file->getClientOriginalName(),
                'path' => $filePath,
                'url' => $fileUrl,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'category' => $request->category,
                'uploaded_by' => Auth::id(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'File uploaded successfully',
                'media' => $media
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }

    // Upload to Server (local/public storage)
    public function uploadToServer(Request $request)
    {
        return $this->handleUpload($request, 'public');
    }

    // Upload to Dropbox
    public function uploadToDropbox(Request $request)
    {
        return $this->handleUpload($request, 'dropbox');
    }

    // Upload to Google Drive
    public function uploadToGoogleDrive(Request $request)
    {
        return $this->handleUpload($request, 'google');
    }

    // Upload to OneDrive
    public function uploadToOneDrive(Request $request)
    {
        return $this->handleUpload($request, 'onedrive');
    }
}
