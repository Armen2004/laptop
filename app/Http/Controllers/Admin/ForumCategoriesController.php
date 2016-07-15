<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Requests;
use App\Models\ForumCategory;
use Illuminate\Http\Request;

class ForumCategoriesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $categories = ForumCategory::all();

        return view('admin.forum-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.forum-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        ForumCategory::create($request->all());

        Session::flash('flash_message', 'Forum category added!');

        return redirect('admin/forum-categories');
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
        $category = ForumCategory::findOrFail($id);

        return view('admin.forum-categories.show', compact('category'));
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
        $category = ForumCategory::findOrFail($id);

        return view('admin.forum-categories.edit', compact('category'));
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
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = ForumCategory::findOrFail($id);
        $category->update($request->all());

        Session::flash('flash_message', 'Forum category updated!');

        return redirect('admin/forum-categories');
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
        ForumCategory::destroy($id);

        Session::flash('flash_message', 'Forum category deleted!');

        return redirect('admin/forum-categories');
    }
}
