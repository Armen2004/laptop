<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\Http\Requests;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseTypesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $coursetypes = CourseType::paginate(15);

        return view('admin.course-types.index', compact('coursetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.course-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        CourseType::create($request->all());

        Session::flash('flash_message', 'CourseType added!');

        return redirect('admin/course-types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $coursetype = CourseType::findOrFail($id);

        return view('admin.course-types.show', compact('coursetype'));
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
        $coursetype = CourseType::findOrFail($id);

        return view('admin.course-types.edit', compact('coursetype'));
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
        $this->validate($request, ['name' => 'required', ]);

        $coursetype = CourseType::findOrFail($id);
        $coursetype->update($request->all());

        Session::flash('flash_message', 'CourseType updated!');

        return redirect('admin/course-types');
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
        CourseType::destroy($id);

        Session::flash('flash_message', 'CourseType deleted!');

        return redirect('admin/course-types');
    }
}
