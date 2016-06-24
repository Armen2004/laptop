<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use Session;
use App\Models\Blog;
use App\Http\Requests;
use Illuminate\Http\Request;

class BlogController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $blog = Blog::paginate(15);

        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'file' => 'required|image'
        ]);

        $photo = $request->file('file');
        $destinationPath = base_path('/public/img/blog/');
        $image = preg_replace('/[^a-zA-Z0-9_.]/', '_', $request->input('title')) . '.' . $photo->getClientOriginalExtension();

        if (!\File::isFile($destinationPath)) {
            \File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        Image::make($photo->getRealPath())->resize(160, 160)->save($destinationPath . $image);

        $request->merge(['image' => $image]);

        $this->user->user()->blogs()->save(new Blog($request->all()));

        Session::flash('flash_message', 'Blog added!');

        return redirect('admin/blog');
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
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
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
        $blog = Blog::findOrFail($id);

        return view('admin.blog.edit', compact('blog'));
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
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'file' => 'image'
        ]);
        if($request->file('file')) {
            $photo = $request->file('file');
            $destinationPath = base_path('/public/img/blog/');
            $image = preg_replace('/[^a-zA-Z0-9_.]/', '_', $request->input('title')) . '.' . $photo->getClientOriginalExtension();

            if (!\File::isFile($destinationPath)) {
                \File::makeDirectory($destinationPath, $mode = 0777, true, true);
            }

            Image::make($photo->getRealPath())->save($destinationPath . $image);

            $request->merge(['image' => $image]);
        }

//        $this->user->user()->blogs()->save(new Blog($request->all()));
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        Session::flash('flash_message', 'Blog updated!');

        return redirect('admin/blog');
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
        Blog::destroy($id);

        Session::flash('flash_message', 'Blog deleted!');

        return redirect('admin/blog');
    }
}
