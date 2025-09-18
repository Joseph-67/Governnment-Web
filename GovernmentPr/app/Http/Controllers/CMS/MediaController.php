<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\MediaCategory;
use App\Models\Media;


class MediaController extends Controller
{
    /**
     * Display a listing of media files.
     */
    public function index()
    {
        $data['categories'] = MediaCategory::with(['media' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->get();

        return view('components.cms.media.index', $data);
    }

    public function getFiles(Request $request, $categoryId)
    {
        $files = Media::where('category_id', $categoryId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('components.cms.media.partials.files', compact('files'))->render();
    }

    /**
     * Show the form for uploading a new media file.
     */
    public function create()
    {
        return view('cms.media.create');
    }

    /**
     * Store a newly uploaded media file.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:10240', // max 10MB
            'upload_type' => 'required|in:server,onedrive,googledrive,dropbox',
            'category_id' => 'required|exists:media_categories,category_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $file = $request->file('file');
        $uploadType = $request->input('upload_type');
        $categoryId = $request->input('category_id');
        $successMessage = '';

        switch ($uploadType) {
            case 'server':
                $uniqueName = uniqid() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('media', $uniqueName, 'public');
                $successMessage = 'Media file uploaded to server successfully!';
                break;

            case 'onedrive':
                // Implement OneDrive upload logic here
                $path = $this->uploadToOneDrive($file);
                $successMessage = 'Media file uploaded to OneDrive successfully!';
                break;

            case 'googledrive':
                // Implement Google Drive upload logic here
                $path = $this->uploadToGoogleDrive($file);
                $successMessage = 'Media file uploaded to Google Drive successfully!';
                break;

            case 'dropbox':
                // Implement Dropbox upload logic here
                $path = $this->uploadToDropbox($file);
                $successMessage = 'Media file uploaded to Dropbox successfully!';
                break;
        }

        // You can save category info to DB here if needed
        Media::create([
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'url' => Storage::disk('public')->url($path),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'category_id' => $categoryId,
            'guard' => 'admin',
            'uploaded_by' => auth()->id(),
        ]);

        return response()->json(['success' => true, 'message' => $successMessage], 201);
    }

    /**
     * Remove the specified media file.
     */
    public function destroy($filename)
    {
        Storage::disk('public')->delete('media/' . $filename);

        return redirect()->route('cms.media.index')
            ->with('success', 'Media file deleted successfully!');
    }
}