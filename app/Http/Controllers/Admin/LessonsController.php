<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests;
use App\UploadHelperClass;
use App\Models\LessonType;
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
        $types = LessonType::pluck('name', 'id');
        return view('admin.lessons.create', compact('courses', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'title' => 'required|unique:lessons,title',
            'slug' => 'required|unique:lessons,slug',
            'video_length' => [['required', 'regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/']],
            'file' => 'required|mime-types:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-wmv',
            'description' => 'required',
            'course_id' => 'required|integer|exists:courses,id',
            'lesson_type_id' => 'required|integer|exists:lesson_types,id',
            'price' => ['regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
            'status' => 'boolean'
        ]);


        $course = Course::findOrFail($request->input('course_id'));

        $video = $this->upload->videoUpload($request, 'lessons');
        
        $request->merge(['video' => $video]);

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
        $types = LessonType::pluck('name', 'id');

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
            'title' => 'required|unique:lessons,title,' . $lesson->title . ',title',
            'slug' => 'required|unique:lessons,slug,' . $lesson->slug . ',slug',
//            'video_length' => 'required|integer',
            'video_length' => ['required', 'regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/'],
            'file' => 'required|mime-types:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-wmv',
            'description' => 'required',
            'course_id' => 'required|integer',
            'lesson_type_id' => 'required|integer',
            'price' => ['regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
            'status' => 'boolean'
        ]);

        dd($request->all());

        if($request->hasFile('file')){
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
        Lesson::destroy($id);

        Session::flash('flash_message', 'Lesson deleted!');

        return redirect('admin/lessons');
    }

    public function getCourse(){
        return response(Course::findOrFail(request()->input('id', null)));
    }
}
