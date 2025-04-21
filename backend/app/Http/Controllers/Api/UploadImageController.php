<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class UploadImageController extends Controller
{
    /**
     * Image Upload
     **/
    public function fileUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('image');
        $filename =  time() . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($filename, file_get_contents($file));

        return $this->successResponse($filename);
    }
}
