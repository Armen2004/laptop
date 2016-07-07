<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UsersController extends ApiBaseController
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = $this->user->attempt($credentials);

        return response(['status' => true]);
    }

    public function logout()
    {
        $user = $this->user->logout();
        return response(['status' => $user]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $request->merge(['user_type_id' => 1]);

        $user = User::create($request->all());
        $this->user->login($user);

        return response(['status' => true]);
    }

    public function check()
    {
        if ($this->user->check())
            return response(['loggedIn' => true]);
        return response(['loggedIn' => false]);
    }

}
