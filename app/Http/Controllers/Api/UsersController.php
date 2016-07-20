<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends ApiBaseController
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $this->user->attempt($credentials);

        return response(['status' => true]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function logout()
    {
        $this->user->logout();
        return response(['status' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $request->merge(['user_type_id' => 1]);

        $this->user->login(User::create($request->all()));

        return response(['status' => true]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function check()
    {
        if ($this->user->check())
            return response([
                'loggedIn' => true,
                'userInfo' => $this->user->user()
            ]);
        return response([
            'loggedIn' => false,
            'userInfo' => ''
        ]);
    }

}
