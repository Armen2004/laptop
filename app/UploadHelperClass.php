<?php
namespace App;

use Image;
use Storage;
use Illuminate\Http\Request;

class UploadHelperClass
{
    /**
     * @var \Illuminate\Filesystem\FilesystemAdapter
     */
    private $s3;

    /**
     * UploadHelperClass constructor.
     */
    public function __construct()
    {
        $this->s3 = Storage::disk('s3');
    }

    /**
     * Image Upload functionality
     *
     * @param Request $request
     * @param $path
     * @param bool $oldFile
     * @param int $quality
     * @param bool $resize
     * @param int $width
     * @param int $height
     * @return string
     */
    public function uploadImage(Request $request, $path, $oldFile = false, $quality = 90, $resize = false, $width = 160, $height = 160)
    {

        if ($oldFile && $this->s3->exists($oldFile)) {
            $this->deleteFile($oldFile);
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

    /**
     * Video upload functionality
     *
     * @param Request $request
     * @param $path
     * @param bool $oldFile
     * @return string
     */
    public function videoUpload(Request $request, $path, $oldFile = false)
    {

        if ($oldFile && $this->s3->exists($oldFile)) {
            $this->deleteFile($oldFile);
        }

        $video = $request->file('video_file');

        $file = sha1(time()) . '.' . $video->getClientOriginalExtension();

        $upload = $this->s3->put($path . '/' . $file, file_get_contents($video->getRealPath()), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

    /**
     * PDF upload functionality
     *
     * @param Request $request
     * @param $path
     * @param bool $oldFile
     * @return string
     */
    public function pdfUpload(Request $request, $path, $oldFile = false)
    {

        if ($oldFile && $this->s3->exists($oldFile)) {
            $this->deleteFile($oldFile);
        }

        $pdf = $request->file('pdf_file');

        $file = sha1(time()) . '.' . $pdf->getClientOriginalExtension();

        $upload = $this->s3->put($path . '/' . $file, file_get_contents($pdf->getRealPath()), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

    /**
     * File delete functionality
     *
     * @param $file
     * @return bool
     */
    public function deleteFile($file)
    {
        if (!is_null($file) && $this->s3->exists($file)) {
            return $this->s3->delete($file);
        }
        return false;
    }

    public function uploadImageFlow($file_location, $path, $oldFile = false)
    {
        if ($oldFile && $this->s3->exists($oldFile)) {
            $this->deleteFile($oldFile);
        }

        $image = Image::make($file_location)->encode('jpg', 90);

        $file = sha1(time()) . '.jpg';

        $upload = $this->s3->put($path . '/' . $file, $image->stream()->__toString(), 'public');

        if (!$upload) {
            abort(404);
        }

        return $path . '/' . $file;
    }

}