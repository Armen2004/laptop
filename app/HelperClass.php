<?php
namespace App;

use Image;
use Storage;
use Illuminate\Http\Request;

class HelperClass
{
    public static function imageUpload(Request $request, $path, $field_name)
    {
        $uploaded_file = $request->file('file');

        $file = preg_replace('/[^a-zA-Z0-9_.]/', '_', strtolower($request->input($field_name))) . '.' . $uploaded_file->getClientOriginalExtension();

        $upload = Storage::disk('s3')->put($path . '/' . $file, file_get_contents($uploaded_file), 'public');

        if(!$upload) {
            abort(404);
        }
        
        return $path . '/' . $file;
    }

    public static function videoUpload(Request $request, $path, $field_name)
    {

//        dd(Storage::disk('s3')->get('test.text'));

        $uploaded_file = $request->file('file');
        $file = preg_replace('/[^a-zA-Z0-9_.]/', '_', strtolower($request->input($field_name))) . '.' . $uploaded_file->getClientOriginalExtension();

//        dd(Storage::disk('s3')->put('test.text'));

        return $path . $file;


    }

}