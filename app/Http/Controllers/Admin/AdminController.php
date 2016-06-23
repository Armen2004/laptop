<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Admin;

class AdminController extends AdminBaseController
{

    public function login()
    {
        if ($this->user->user()) {
            return redirect('admin/dashboard');
        }

        if (request()->isMethod('get')) {
            return view('admin.auth.login');
        }

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = request()->input('remember') ? true : false;

        if ($this->user->attempt(['email' => request()->input('email'), 'password' => request()->input('password')], $remember)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors(['error' => 'Incorrect admin login or password']);
    }

    public function register()
    {
        if ($this->user->user()) {
            return redirect('admin/dashboard');
        }

        if (request()->isMethod('get')) {
            return view('admin.auth.register');
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed'
        ]);

        $remember = request()->input('remember') ? true : false;
        
        if ($this->user->login(Admin::create(request()->all()), $remember)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors(['error' => 'Incorrect admin login or password']);
    }

    public function logout()
    {
        if ($this->user->user()) {
            $this->user->logout();
            return redirect('admin/login');
        }
        return redirect('admin/dashboard');
    }

}
