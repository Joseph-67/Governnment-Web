<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\MediaCategory;
use App\Models\Media;
use App\Models\StorageSource;


class MediaController extends Controller
{
    /**
     * Display a listing of media files.
     */
    public function index()
    {
        $data['storages'] = StorageSource::all()->map(function ($storage) {
            // Count files based on category/source name
            $filesCount = Media::where('storage_source', $storage->name)->count();

            // Calculate total size in GB from Media table
            $totalSize = Media::where('storage_source', $storage->name)->sum('size') / 1073741824; // bytes to GB
            // Percentage usage
            $percentage = ($totalSize / $storage->capacity) * 100;

            return [
                'name'       => $storage->name,
                'icon'       => $storage->icon,
                'files'      => $filesCount,
                'capacity'   => $storage->capacity,
                'used'       => $totalSize,
                'percentage' => $percentage
            ];
        });
        $data['categories'] = MediaCategory::with(['media' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->get();

        // dd($data['storages']);
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
        $validator = Validator::make($request->all(), [
            'files' => 'required|array|min:1|max:100',  // Require 1–10 files max
            'files.*' => [
                'required',
                'file',
                'max:512000', // 500MB per file
                'mimes:jpg,jpeg,png,gif,mp4,mov,avi,mp3,wav,pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar', // restrict to safe file types
                'mimetypes:image/jpeg,image/png,image/gif,video/mp4,video/quicktime,video/x-msvideo,audio/mpeg,audio/wav,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/zip,application/x-rar-compressed'
            ],
            'upload_type' => 'required|in:server,onedrive,googledrive,dropbox',
            'category_id' => 'required|integer|exists:media_categories,category_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $files = $request->file('files'); // get all files
        $uploadType = $request->input('upload_type');
        $categoryId = $request->input('category_id');
        $successMessage = '';
        $uploadedFiles = [];

        foreach ($files as $file) {
            switch ($uploadType) {
                case 'server':
                    $uniqueName = uniqid() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('media', $uniqueName, 'public');
                    $successMessage = 'Media file(s) uploaded to server successfully!';
                    break;

                case 'onedrive':
                    $path = $this->uploadToOneDrive($file);
                    $successMessage = 'Media file(s) uploaded to OneDrive successfully!';
                    break;

                case 'googledrive':
                    $path = $this->uploadToGoogleDrive($file);
                    $successMessage = 'Media file(s) uploaded to Google Drive successfully!';
                    break;

                case 'dropbox':
                    $path = $this->uploadToDropbox($file);
                    $successMessage = 'Media file(s) uploaded to Dropbox successfully!';
                    break;
            }

            $media = Media::create([
                'original_name' => $file->getClientOriginalName(),
                'path' => $path,
                'url' => $uploadType === 'server' ? Storage::disk('public')->url($path) : $path,
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'storage_source' => $uploadType,
                'category_id' => $categoryId,
                'guard' => 'admin',
                'uploaded_by' => auth()->id(),
            ]);

            $uploadedFiles[] = $media;
        }

        return response()->json([
            'success' => true,
            'message' => $successMessage,
            'uploaded_files' => $uploadedFiles
        ], 201);
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