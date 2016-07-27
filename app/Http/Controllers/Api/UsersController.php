<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsersController extends ApiBaseController
{

    /**
     * Login in user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->user->attempt($credentials) == true)
            return response(['status' => true]);
        else
            return response(['status' => false]);
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function logout()
    {
        $this->user->logout();
        return response(['status' => true]);
    }

    /**
     * Register user
     *
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
     * Check user
     *
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

    /**
     * Reset user password
     *
     */
    public function resetEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $token = csrf_token();

        $emails = $request->input('email');
        $email = Mail::send('templates.emails.password', ['token' => $token], function ($message) use ($emails) {
            $message->from('us@example.com', 'Your Password Reset Link');
            $message->to($emails)->subject('Your Password Reset Link');
        });

        if ($email) {
            $db = DB::table('password_resets')->insert([
                'email' => $emails,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        if ($email && $db)
            return response(['status' => true]);
        else
            return response(['status' => false]);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:password_resets,email',
            'token' => 'required|exists:password_resets,token',
            'password' => 'required|confirmed'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        $user->forceFill([
            'password' => $request->input('password'),
            'remember_token' => Str::random(60),
        ])->save();

        DB::table('password_resets')
            ->where('email', $request->input('email'))
            ->where('token', $request->input('token'))
            ->delete();

        $this->user->login($user);

        return response(['status' => true]);
    }

}
