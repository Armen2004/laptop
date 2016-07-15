<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Requests;
use App\Models\ForumPost;
use Illuminate\Http\Request;
use App\Models\ForumTopic;

class ForumPostsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $posts = ForumPost::paginate(15);

        return view('admin.forum-posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $topics = ForumTopic::pluck('title', 'id');
        $post_list = ForumPost::pluck('comment', 'id');
        return view('admin.forum-posts.create', compact('topics', 'post_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'forum_topic_id' => 'required|exists:forum_topics,id',
            'parent_id' => 'integer|required_with:replay',
            'replay' => 'integer',
            'comment' => 'required'
        ]);

        $this->user->user()->forumPosts()->save(new ForumPost($request->all()));

        Session::flash('flash_message', 'Form post added!');

        return redirect('admin/forum-posts');
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
        $post = ForumPost::findOrFail($id);

        return view('admin.forum-posts.show', compact('post'));
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
        $topics = ForumTopic::pluck('title', 'id');
        $post_list = ForumPost::pluck('comment', 'id');
        $post = ForumPost::findOrFail($id);

        return view('admin.forum-posts.edit', compact('post', 'topics', 'post_list'));
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
            'forum_topic_id' => 'required|exists:forum_topics,id',
            'parent_id' => 'integer|required_with:replay',
            'replay' => 'integer',
            'comment' => 'required'
        ]);

        $post = ForumPost::findOrFail($id);
        $post->update($request->all());

        Session::flash('flash_message', 'Form post updated!');

        return redirect('admin/forum-posts');
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
        ForumPost::destroy($id);

        Session::flash('flash_message', 'Form post deleted!');

        return redirect('admin/forum-posts');
    }
}
