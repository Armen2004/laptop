<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Page;
use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $pages = Page::paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Page::create($request->all());

        Session::flash('flash_message', 'Page added!');

        return redirect('admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.show', compact('page'));
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
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
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
        $this->validate($request, ['name' => 'required']);
        $page = Page::findOrFail($id);
        $page->update($request->all());

        Session::flash('flash_message', 'Page updated!');

        return redirect('admin/pages');
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
        Page::destroy($id);

        Session::flash('flash_message', 'Page deleted!');

        return redirect('admin/pages');
    }
}
