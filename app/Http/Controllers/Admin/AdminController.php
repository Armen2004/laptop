<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Intervention\Image\Facades\Image;

class AdminController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin');
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
            'password' => 'required',
            'file' => 'image'
        ]);
        if (request()->file('file')) {
            $photo = request()->file('file');
            $destinationPath = public_path('img/profile/admin-logo/');
            $image = strtolower($this->user->user()->name) . '-logo.' . $photo->getClientOriginalExtension();
            if (!\File::isFile($destinationPath)) {
                \File::makeDirectory($destinationPath, $mode = 0777, true, true);
            }
            Image::make($photo->getRealPath())->resize(160, 160)->save($destinationPath . $image);
            request()->merge(['image' => 'img/profile/admin-logo/' . $image]);
        }
        $this->user->user()->update(request()->except(['file']));
        session()->flash('flash_message', 'Profile updated successfully!');
        return redirect('admin/profile');
    }

//    public function login()
//    {
//        if ($this->user->user()) {
//            return redirect('admin/dashboard');
//        }
//
//        if (request()->isMethod('get')) {
//            return view('admin.auth.login');
//        }
//
//        $this->validate(request(), [
//            'email' => 'required|email',
//            'password' => 'required'
//        ]);
//
//        $remember = request()->input('remember') ? true : false;
//
//        if ($this->user->attempt(['email' => request()->input('email'), 'password' => request()->input('password')], $remember)) {
//            return redirect()->intended('admin/dashboard');
//        }
//
//        return redirect()->back()->withErrors(['error' => 'Incorrect admin login or password']);
//    }
//
//    public function register()
//    {
//        if ($this->user->user()) {
//            return redirect('admin/dashboard');
//        }
//
//        if (request()->isMethod('get')) {
//            return view('admin.auth.register');
//        }
//
//        $this->validate(request(), [
//            'name' => 'required',
//            'email' => 'required|email|unique:admins,email',
//            'password' => 'required|confirmed'
//        ]);
//
//        $remember = request()->input('remember') ? true : false;
//
//        if ($this->user->login(Admin::create(request()->all()), $remember)) {
//            return redirect()->intended('admin/dashboard');
//        }
//
//        return redirect()->back()->withErrors(['error' => 'Incorrect admin login or password']);
//    }
//
//    public function logout()
//    {
//        if ($this->user->user()) {
//            $this->user->logout();
//            return redirect('admin/login');
//        }
//        return redirect('admin/dashboard');
//    }

}
