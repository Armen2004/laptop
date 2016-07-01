<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests;
use App\Models\UserType;
use App\UploadHelperClass;
use Illuminate\Http\Request;

class LessonsController extends AdminBaseController
{
    /**
     * @var UploadHelperClass
     */
    private $upload;

    public function __construct()
    {
        parent::__construct();
        $this->upload = new UploadHelperClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $lessons = Lesson::orderBy('created_at','desc')->paginate(15);

        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        $types = UserType::pluck('name', 'id');
        return view('admin.lessons.create', compact('courses', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_type_id' => 'required|integer|exists:user_types,id',
            'course_id' => 'required|integer|exists:courses,id',
            'title' => 'required|unique:lessons,title',
            'slug' => 'required|unique:lessons,slug',
            'status' => 'boolean',
            'video_file' => 'mimes:avi,mpeg,mpg,mov,mp4,mpg4,flv,mkv,wmv',
            'video_link' => 'required_without:video_file',
//            'video_length' => [['required', 'regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/']],
            'video_length' => 'required|integer',
            'image_file' => 'image',
            'pdf_file' => 'required|mimes:pdf',
            'description' => 'required',
//            'price' => ['regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ]);

        $course = Course::findOrFail($request->input('course_id'));

        $pdf = $this->upload->pdfUpload($request, 'lessons/' . $course->slug);

        if($request->hasFile('video_file')){
            $video = $this->upload->videoUpload($request, 'lessons/' . $course->slug);
            $request->merge(['video' => $video]);
        }else{
            $request->merge(['video' => $request->input('video_link')]);
        }

        if($request->hasFile('image_file')){
            $image = $this->upload->uploadImage($request, 'lessons/' . $course->slug);
            $request->merge(['image' => $image]);
        }
        
        $request->merge(['pdf' => $pdf]);

        $this->user->user()->lessons()->save(new Lesson($request->all()));

        Session::flash('flash_message', 'Lesson added!');

        return redirect('admin/lessons');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $course
     * @param  string $lesson
     *
     * @return mixed
     */
    public function show($course, $lesson)
    {
        $course = Course::whereSlug($course)->first();

        if (!$course)
            abort(404);

        $lesson = $course->lessons->where('slug', $lesson)->first();
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::pluck('name', 'id');
        $types = UserType::pluck('name', 'id');

        return view('admin.lessons.edit', compact('lesson', 'courses', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $lesson = Lesson::findOrFail($id);

        $this->validate($request, [
            'user_type_id' => 'required|integer|exists:user_types,id',
            'course_id' => 'required|integer|exists:courses,id',
            'title' => 'required|unique:lessons,title,' . $lesson->title . ',title',
            'slug' => 'required|unique:lessons,slug,' . $lesson->slug . ',slug',
            'status' => 'boolean',
            'video_file' => 'mimes:avi,mpeg,mpg,mov,mp4,mpg4,flv,mkv,wmv',
            'video_link' => 'required_without:video_file',
//            'video_length' => [['required', 'regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/']],
            'video_length' => 'required|integer',
            'image_file' => 'image',
            'pdf_file' => 'mimes:pdf',
            'description' => 'required',
//            'price' => ['regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],

        ]);

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }

        $course = Course::findOrFail($request->input('course_id'));

        if($request->hasFile('pdf_file')) {
            $pdf = $this->upload->pdfUpload($request, 'lessons/' . $course->slug, $lesson->pdf);
            $request->merge(['pdf' => $pdf]);
        }

        if($request->hasFile('video_file')){
            $video = $this->upload->videoUpload($request, 'lessons/' . $course->slug, $lesson->video);
            $request->merge(['video' => $video]);
        }else{
            $request->merge(['video' => $request->input('video_link')]);
        }

        if($request->hasFile('image_file')){
            $image = $this->upload->uploadImage($request, 'lessons/' . $course->slug, $lesson->image);
            $request->merge(['image' => $image]);
        }


        if($request->hasFile('video_file')){
            $video = $this->upload->videoUpload($request, 'videos');
            $request->merge(['video' => $video]);
        }

        $lesson->update($request->all());

        Session::flash('flash_message', 'Lesson updated!');

        return redirect('admin/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->delete();

        $this->upload->deleteFile($lesson->image);
        $this->upload->deleteFile($lesson->video);
        $this->upload->deleteFile($lesson->pdf);

        Session::flash('flash_message', 'Lesson deleted!');

        return redirect('admin/lessons');
    }

    public function getCourse(){
        return response(Course::findOrFail(request()->input('id', null)));
    }
}
