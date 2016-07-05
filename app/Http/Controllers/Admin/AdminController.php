<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\UploadHelperClass;

class AdminController extends AdminBaseController
{
    /**
     * @var UploadHelperClass
     */
    private $upload;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin');
        $this->upload = new UploadHelperClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'change_password' => 'integer',
            'new_password' => 'required_with:change_password',
            'image_file' => 'image'
        ]);

        if(request()->hasFile('image_file')){
            $image = $this->upload->uploadImage(request(), 'admins', $this->user->user()->image);
            request()->merge(['image' => $image]);
        }

        if (request()->has('new_password')){
            request()->merge(['password' => request()->input('new_password')]);
        }

        $this->user->user()->update(request()->all());
        session()->flash('flash_message', 'Profile updated successfully!');
        return redirect('admin/profile');
    }

}
