<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class MembersController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $activeMembers = User::orderBy('created_at', 'desc')->paginate(15);
        $blockedMembers = User::onlyTrashed()->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.members.index', compact('activeMembers', 'blockedMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'image' => 'required'
        ]);

        User::create($request->all());

        Session::flash('flash_message', 'Member added!');

        return redirect('admin/members');
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
        $member = User::findOrFail($id);

        return view('admin.members.show', compact('member'));
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
        $member = User::findOrFail($id);

        return view('admin.members.edit', compact('member'));
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
            'name' => 'required',
            'email' => 'required',
            'image' => 'required'
        ]);

        $member = User::findOrFail($id);
        $member->update($request->all());

        Session::flash('flash_message', 'Member updated!');

        return redirect('admin/members');
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
        $user = User::withTrashed()->findOrFail($id);
        if (request()->has('block')) {
            $user->delete();
            $massage = 'Member blocked!';
        } elseif(request()->has('restore')) {
            $user->restore();
            $massage = 'Member restored!';
        }else{
            $user->forceDelete();
            $massage = 'Member deleted!';
        }

        Session::flash('flash_message', $massage);

        return redirect('admin/members');
    }
}
