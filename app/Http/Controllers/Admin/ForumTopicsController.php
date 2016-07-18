<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Requests;
use App\Models\ForumCategory;
use App\Models\ForumTopic;
use Illuminate\Http\Request;

class ForumTopicsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $topics = ForumTopic::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.forum-topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $categories = ForumCategory::pluck('name', 'id');
        return view('admin.forum-topics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'forum_category_id' => 'required',
            'title' => 'required', 
            'slug' => 'required', 
            'description' => 'required'
        ]);

        $this->user->user()->forumTopics()->save(new ForumTopic($request->all()));

        Session::flash('flash_message', 'Forum Topic added!');

        return redirect('admin/forum-topics');
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
        $topic = ForumTopic::whereSlug($slug)->first();
        if (!$topic)
            abort(404);

        return view('admin.forum-topics.show', compact('topic'));
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
        $topic = ForumTopic::findOrFail($id);
        $categories = ForumCategory::pluck('name', 'id');
        return view('admin.forum-topics.edit', compact('topic', 'categories'));
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
            'forum_category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);

        $topic = ForumTopic::findOrFail($id);
        $topic->update($request->all());

        Session::flash('flash_message', 'Forum Topic updated!');

        return redirect('admin/forum-topics');
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
        ForumTopic::destroy($id);

        Session::flash('flash_message', 'Forum Topic deleted!');

        return redirect('admin/forum-topics');
    }
}
