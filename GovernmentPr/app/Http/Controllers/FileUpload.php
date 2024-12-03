<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
    //
    public function UploadAnyFile($file, $directory)
    {
        # code...
        // create new file name
        
        $filename = strtotime(now())."_".rand(1111, 9999).".".$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename);
        $file_path = $directory."/".$filename;

        // dd($file_path);
        return $file_path;
    }
}
