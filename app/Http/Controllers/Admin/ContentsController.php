<?php

namespace App\Http\Controllers\Admin;


use App\Models\Page;
use Session;
use App\Http\Requests;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $contents = Content::paginate(15);

        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $pages = Page::pluck('name', 'id');
        
        return view('admin.contents.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['page_id' => 'required|integer', 'content' => 'required']);

        Content::create($request->all());

        Session::flash('flash_message', 'Content added!');

        return redirect('admin/contents');
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
        $content = Content::findOrFail($id);

        return view('admin.contents.show', compact('content'));
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
        $content = Content::findOrFail($id);

        return view('admin.contents.edit', compact('content'));
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
        $this->validate($request, ['page_id' => 'required|integer', 'content' => 'required']);
        $content = Content::findOrFail($id);
        $content->update($request->all());

        Session::flash('flash_message', 'Content updated!');

        return redirect('admin/contents');
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
        Content::destroy($id);

        Session::flash('flash_message', 'Content deleted!');

        return redirect('admin/contents');
    }
}
