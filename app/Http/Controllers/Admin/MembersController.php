<?php

namespace App\Http\Controllers\Admin;


use App\HelperClass;
use App\Models\UserType;
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
        $types = UserType::pluck('name', 'id');
        return view('admin.members.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_type_id' => 'required|integer|exists:user_types,id',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'file' => 'image'
        ]);

        $image = HelperClass::imageUpload($request, 'users', 'name');
        $request->merge(['image' => $image]);
        dd($request->all());
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
        $member = User::findOrFail($id);

        $this->validate($request, [
            'user_type_id' => 'required|integer|exists:user_types,id',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $member->email . ',email',
            'file' => 'image'
        ]);

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
