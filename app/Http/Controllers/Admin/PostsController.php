<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Post;
use App\Http\Requests;
use App\UploadHelperClass;
use Illuminate\Http\Request;

class PostsController extends AdminBaseController
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
        $posts = Post::orderBy('created_at','desc')->paginate(15);

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
            'image_file' => 'required|image',
            'status' => 'boolean'
        ]);

        $image = $this->upload->uploadImage($request, 'posts');

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
        $post = Post::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|unique:posts,title,' . $post->title . ',title',
            'slug' => 'required|unique:posts,slug,' . $post->slug . ',slug',
            'description' => 'required',
            'image_file' => 'image',
            'status' => 'boolean'
        ]);

        if(!$request->has('status')){
            $request->merge(['status' => 0]);
        }

        if($request->hasFile('image_file')){
            $image = $this->upload->uploadImage($request, 'posts', $post->image);
            $request->merge(['image' => $image]);
        }

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
        $post = Post::findOrFail($id);
        
        $post->delete();

        $this->upload->deleteFile($post->image);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('admin/posts');
    }
}
