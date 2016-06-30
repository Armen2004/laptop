<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Requests;
use App\Models\LessonType;
use Illuminate\Http\Request;

class LessonTypesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $lessontypes = LessonType::paginate(15);

        return view('admin.lesson-types.index', compact('lessontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.lesson-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:lesson_types,name'
        ]);

        LessonType::create($request->all());

        Session::flash('flash_message', 'Lesson Type added!');

        return redirect('admin/lesson-types');
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
        $lessontype = LessonType::findOrFail($id);

        return view('admin.lesson-types.show', compact('lessontype'));
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
        $lessontype = LessonType::findOrFail($id);

        return view('admin.lesson-types.edit', compact('lessontype'));
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
        $this->validate($request, [
            'name' => 'required|unique:lesson_types,name'
        ]);

        $lessontype = LessonType::findOrFail($id);
        $lessontype->update($request->all());

        Session::flash('flash_message', 'Lesson Type updated!');

        return redirect('admin/lesson-types');
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
        LessonType::destroy($id);

        Session::flash('flash_message', 'Lesson Type deleted!');

        return redirect('admin/lesson-types');
    }
}
