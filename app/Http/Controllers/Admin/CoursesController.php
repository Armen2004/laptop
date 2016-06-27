<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Course;
use App\Http\Requests;
use App\Models\CourseType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CoursesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $activeCourses = Course::orderBy('created_at', 'desc')->paginate(15);
        $blockedCourses = Course::onlyTrashed()->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.courses.index', compact('activeCourses', 'blockedCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $types = CourseType::pluck('name', 'id');

        return view('admin.courses.create', compact('types'));
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
            'file' => 'required|image',
            'status' => 'boolean',
            'description' => 'required',
            'price' => [ 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/' ]
        ]);

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }
        if(!$request->has('price')){
            $request->merge(['price' => 0]);
        }

        $image = $this->fileUpload($request);

        $request->merge(['image' => $image]);

        $this->user->user()->courses()->save(new Course($request->all()));

        Session::flash('flash_message', 'Course added!');

        return redirect('admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     *
     * @return mixed
     */
    public function show($slug)
    {
        $course = Course::whereSlug($slug)->first();
        if(!$course)
            abort(404);
        return view('admin.courses.show', compact('course'));
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
        $course = Course::findOrFail($id);
        $types = CourseType::pluck('name', 'id');

        return view('admin.courses.edit', compact('course', 'types'));
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
        $course = Course::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:courses,name,' . $course->name . ',name',
            'slug' => 'required|unique:courses,slug,' . $course->slug . ',slug',
            'file' => 'image',
            'status' => 'boolean',
            'description' => 'required',
            'price' => [ 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/' ]
        ]);

        if ($request->file('file')) {
            $image = $this->fileUpload($request);
            $request->merge(['image' => $image]);
        }

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }

        $course->update($request->all());

        Session::flash('flash_message', 'Course updated!');

        return redirect('admin/courses');
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

        $course = Course::withTrashed()->findOrFail($id);
        if (request()->has('block')) {
            $course->delete();
            $massage = 'Course blocked!';
        } elseif(request()->has('restore')) {
            $course->restore();
            $massage = 'Course restored!';
        }else{
            $course->forceDelete();
            $massage = 'Course deleted!';
        }

        Session::flash('flash_message', $massage);

        return redirect('admin/courses');
    }

    private function fileUpload(Request $request)
    {
        $photo = $request->file('file');
        $destinationPath = public_path('img/courses/');
        $image = preg_replace('/[^a-zA-Z0-9_.]/', '_', strtolower($request->input('name'))) . '.' . $photo->getClientOriginalExtension();

        if (!\File::isFile($destinationPath)) {
            \File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        Image::make($photo->getRealPath())->save($destinationPath . $image);

        return 'img/courses/' . $image;
    }
}
