<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\User;
use App\Http\Requests;
use App\Models\UserType;
use App\UploadHelperClass;
use Illuminate\Http\Request;

class MembersController extends AdminBaseController
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
            'password' => 'required',
            'image_file' => 'image'
        ]);

        $image = $this->upload->uploadImage($request, 'users');
        $request->merge(['image' => $image]);

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
        $types = UserType::pluck('name', 'id');

        return view('admin.members.edit', compact('member', 'types'));
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
            'change_password' => 'integer',
            'new_password' => 'required_with:change_password',
            'image_file' => 'image'
        ]);

        if($request->hasFile('image_file')){
            $image = $this->upload->uploadImage($request, 'users', $member->image);
            $request->merge(['image' => $image]);
        }

        if (request()->has('new_password')){
            request()->merge(['password' => request()->input('new_password')]);
        }
        
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
        $member = User::withTrashed()->findOrFail($id);
        if (request()->has('block')) {
            $member->delete();
            $massage = 'Member blocked!';
        } elseif(request()->has('restore')) {
            $member->restore();
            $massage = 'Member restored!';
        }else{
            $member->forceDelete();
            $this->upload->deleteFile($member->image);
            $massage = 'Member deleted!';
        }

        Session::flash('flash_message', $massage);

        return redirect('admin/members');
    }
}
