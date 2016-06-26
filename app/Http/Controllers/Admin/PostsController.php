<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $posts = Post::paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'slug' => 'required|unique:posts,slug',
            'description' => 'required',
            'file' => 'required|image'
        ]);

        $image = $this->fileUpload($request);

        $request->merge(['image' => $image]);

        $this->user->user()->posts()->save(new Post($request->all()));

        Session::flash('flash_message', 'Post added!');

        return redirect('admin/posts');
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
        $post = Post::whereSlug($slug)->first();
        if (!$post)
            abort(404);

        return view('admin.posts.show', compact('post'));
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
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
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
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'file' => 'image'
        ]);
        if ($request->file('file')) {
            $image = $this->fileUpload($request);
            $request->merge(['image' => $image]);
        }

        $post = Post::findOrFail($id);
        $post->update($request->all());

        Session::flash('flash_message', 'Post updated!');

        return redirect('admin/posts');
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
        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('admin/posts');
    }

    private function fileUpload(Request $request)
    {
        $photo = $request->file('file');
        $destinationPath = public_path('img/posts/');
        $image = preg_replace('/[^a-zA-Z0-9_.]/', '_', strtolower($request->input('title'))) . '.' . $photo->getClientOriginalExtension();

        if (!\File::isFile($destinationPath)) {
            \File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        Image::make($photo->getRealPath())->save($destinationPath . $image);

        return 'img/posts/' . $image;
    }
}
