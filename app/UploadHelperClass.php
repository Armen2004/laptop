<?php
namespace App;

use Image;
use Storage;
use Illuminate\Http\Request;

class UploadHelperClass
{
    private $s3;

    public function __construct()
    {
        $this->s3 = Storage::disk('s3');
    }

    public function uploadImage(Request $request, $path, $image = false, $quality = 90, $resize = false, $width = 160, $height = 160)
    {

        if ($image && $this->s3->exists($image)) {
            $this->deleteFile($image);
        }

        $image = Image::make($request->file('image_file'))->encode('jpg', $quality);

        if ($resize) {
            $image->resize($width, $height);
        }

        $file = sha1(time()) . '.jpg';

        $upload = $this->s3->put($path . '/' . $file, $image->stream()->__toString(), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

    public function deleteFile($file)
    {
        if (!is_null($file) && $this->s3->exists($file)) {
            return $this->s3->delete($file);
        }
        return false;
    }

    public function videoUpload(Request $request, $path)
    {
        $video = $request->file('video_file');

        $file = sha1(time()) . '.' . $video->getClientOriginalExtension();

        $upload = $this->s3->put($path . '/' . $file, file_get_contents($video->getRealPath()), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

    public function pdfUpload(Request $request, $path)
    {
        $pdf = $request->file('pdf_file');

        $file = sha1(time()) . '.' . $pdf->getClientOriginalExtension();

        $upload = $this->s3->put($path . '/' . $file, file_get_contents($pdf->getRealPath()), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

}