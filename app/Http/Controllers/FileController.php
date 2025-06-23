<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function photo($fileName)
    {
        $path = storage_path('app/public/photos/' . $fileName);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => mime_content_type($path)
        ]);
    }

    public function upload(Request $request)
    {
        if (Validator::make($request->all(), [
            'photo' => 'required',
        ])->fails()) {
            return response()->json(Validator::make($request->all(), [
                'photo' => 'required',
            ])->errors(), 422);
        }

        if ($request->hasFile('photo')) {
            Storage::disk('public')->putFile('photos', $request->file('photo'));
            $photo = $request->file('photo')->hashName();
        }
        return response()->json([
            'status' => 200,
            'photo' => config('app.url') . '/file/photo/'  . $photo,
            'message' => 'Photo uploaded successfully'
        ]);
    }
}
