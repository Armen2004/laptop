<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\CourseType;
use Intervention\Image\Facades\Image;
use Session;
use App\Models\Lesson;
use App\Http\Requests;
use Illuminate\Http\Request;

class LessonsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $lessons = Lesson::paginate(15);

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
        $types = CourseType::pluck('name', 'id');
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
            'title' => 'required|unique:lessons,title',
            'slug' => 'required|unique:lessons,slug',
            'video_length' => 'required|integer',
            'file' => 'required|mime-types:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-wmv',
            'description' => 'required',
            'course_id' => 'required|integer',
            'course_type_id' => 'required|integer',
            'price' => [ 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/' ],
            'status' => 'boolean'
        ]);

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }

        if(!$request->has('price')){
            $request->merge(['price' => 0]);
        }

        $course = Course::findOrFail($request->input('course_id'));
        $video = $this->fileUpload($request, $course);
        $request->merge(['video' => $video]);

        $this->user->user()->lessons()->save(new Lesson($request->all()));

        Session::flash('flash_message', 'Lesson added!');

        return redirect('admin/lessons');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $course
     * @param  string  $lesson
     *
     * @return mixed
     */
    public function show($course, $lesson)
    {
        $course = Course::whereSlug($course)->first();

        if(!$course)
            abort(404);

        $lesson = $course->lessons->where('slug', $lesson)->first();
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::pluck('name', 'id');
        $types = CourseType::pluck('name', 'id');

        return view('admin.lessons.edit', compact('lesson', 'courses', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $lesson = Lesson::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|unique:lessons,title,' . $lesson->title . ',title',
            'slug' => 'required|unique:lessons,slug,' . $lesson->slug . ',slug',
            'video_length' => 'required|integer',
            'file' => 'required|mime-types:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-wmv',
            'description' => 'required',
            'course_id' => 'required|integer',
            'course_type_id' => 'required|integer',
            'price' => [ 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/' ],
            'status' => 'boolean'
        ]);
        
        if ($request->file('file')) {
            $image = $this->fileUpload($request, $lesson->course);
            $request->merge(['image' => $image]);
        }

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }
        
        $lesson->update($request->all());

        Session::flash('flash_message', 'Lesson updated!');

        return redirect('admin/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        Lesson::destroy($id);

        Session::flash('flash_message', 'Lesson deleted!');

        return redirect('admin/lessons');
    }

    private function fileUpload(Request $request, Course $course)
    {
        $video = $request->file('file');
        $destinationPath = public_path('video/lessons/' . $course->slug . '/');
        $lesson_image = preg_replace('/[^a-zA-Z0-9_.]/', '_', strtolower($request->input('title'))) . '.' . $video->getClientOriginalExtension();

        if (!\File::isFile($destinationPath)) {
            \File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        $video->move($destinationPath, $lesson_image);

        return 'video/lessons/' . $course->slug . '/' . $lesson_image;
    }
    
    public function getCourse(){
        return response(Course::findOrFail(request()->input('id', null)));
    }
}
