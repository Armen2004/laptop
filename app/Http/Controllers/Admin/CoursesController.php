<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Course;
use App\Http\Requests;
use App\UploadHelperClass;
use Illuminate\Http\Request;

class CoursesController extends AdminBaseController
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
        $courses = Course::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:courses,name',
            'slug' => 'required|unique:courses,slug',
            'image_file' => 'required|image',
            'status' => 'boolean',
            'description' => 'required'
        ]);


        $image = $this->upload->uploadImage($request, 'courses');

        $request->merge(['image' => $image]);

        $this->user->user()->courses()->save(new Course($request->all()));

        Session::flash('flash_message', 'Course added!');

        return redirect('admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     *
     * @return mixed
     */
    public function show($slug)
    {
        $course = Course::whereSlug($slug)->first();
        if (!$course)
            abort(404);
        return view('admin.courses.show', compact('course'));
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
        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('course'));
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
        $course = Course::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:courses,name,' . $course->name . ',name',
            'slug' => 'required|unique:courses,slug,' . $course->slug . ',slug',
            'image_file' => 'image',
            'status' => 'boolean',
            'description' => 'required'
        ]);

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }

        if($request->hasFile('image_file')){
            $image = $this->upload->uploadImage($request, 'courses', $course->image);
            $request->merge(['image' => $image]);
        }

        $course->update($request->all());

        Session::flash('flash_message', 'Course updated!');

        return redirect('admin/courses');
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
        $course = Course::findOrFail($id);
        $course->delete();
        $this->upload->deleteFile($course->image);

        Session::flash('flash_message', 'Course deleted!');

        return redirect('admin/courses');
    }
}
