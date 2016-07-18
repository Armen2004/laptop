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
        $categories = ForumCategory::orderBy('sort')->get();

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
            'name' => 'required|unique:forum_categories,name',
            'slug' => 'required|unique:forum_categories,slug'
        ]);

        ForumCategory::create($request->all());

        Session::flash('flash_message', 'Forum category added!');

        return redirect('admin/forum-categories');
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
        $category = ForumCategory::whereSlug($slug)->first();
        if (!$category)
            abort(404);

        return view('admin.forum-categories.show', compact('category'));
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
        $category = ForumCategory::findOrFail($id);

        return view('admin.forum-categories.edit', compact('category'));
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
        $category = ForumCategory::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:forum_categories,name,' . $category->name . ',name',
            'slug' => 'required|unique:forum_categories,slug,' . $category->slug . ',slug'
        ]);

        $category->update($request->all());

        Session::flash('flash_message', 'Forum category updated!');

        return redirect('admin/forum-categories');
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
        ForumCategory::destroy($id);

        Session::flash('flash_message', 'Forum category deleted!');

        return redirect('admin/forum-categories');
    }

    /**
     * Sort forum category with ajax request
     *
     * @param Request $request
     * @return mixed
     */
    public function sort(Request $request)
    {
        if (!request()->ajax()) {
            abort(404);
        }
        $this->validate($request, [
            'data.*.data-id' => 'required|integer|exists:forum_categories,id',
            'data.*.data-sort' => 'required|integer',
        ]);
        $details = $request->input('data');
        foreach ($details as $detail) {
            $category_id = $detail['data-id'];
            $sort = $detail['data-sort'];

            $category = ForumCategory::findOrFail($category_id);
            $category->update([
                'sort' => $sort
            ]);
        }

        return json_encode(['status' => 200, 'message' => 'Sorted Successfully']);
    }
}
