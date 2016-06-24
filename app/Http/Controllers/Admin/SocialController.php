<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Social;
use App\Http\Requests;
use Illuminate\Http\Request;

class SocialController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $social = Social::paginate(15);

        return view('admin.social.index', compact('social'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Social::create($request->all());

        Session::flash('flash_message', 'Social added!');

        return redirect('admin/social');
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
        $social = Social::findOrFail($id);

        return view('admin.social.show', compact('social'));
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
        $social = Social::findOrFail($id);

        return view('admin.social.edit', compact('social'));
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
        $this->validate($request, ['name' => 'required', ]);

        $social = Social::findOrFail($id);
        $social->update($request->all());

        Session::flash('flash_message', 'Social updated!');

        return redirect('admin/social');
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
        Social::destroy($id);

        Session::flash('flash_message', 'Social deleted!');

        return redirect('admin/social');
    }
}
