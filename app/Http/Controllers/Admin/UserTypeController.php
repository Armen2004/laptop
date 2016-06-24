<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Requests;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $usertype = UserType::paginate(15);
        return view('admin.user-type.index', compact('usertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.user-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        UserType::create($request->all());

        Session::flash('flash_message', 'UserType added!');

        return redirect('admin/user-type');
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
        $usertype = UserType::findOrFail($id);

        return view('admin.user-type.show', compact('usertype'));
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
        $usertype = UserType::findOrFail($id);

        return view('admin.user-type.edit', compact('usertype'));
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
        $this->validate($request, ['name' => 'required']);

        $usertype = UserType::findOrFail($id);
        $usertype->update($request->all());

        Session::flash('flash_message', 'UserType updated!');

        return redirect('admin/user-type');
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
        UserType::destroy($id);

        Session::flash('flash_message', 'User Type deleted!');

        return redirect('admin/user-type');
    }
}
