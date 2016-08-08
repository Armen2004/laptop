<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
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
     * Send Reset password link to user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resetEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($this->send($request->input('email')) && $this->store($request->input('email')))
            return response(['status' => true]);
        else
            return response(['status' => false]);
    }

    private function send($email)
    {
        return Mail::send('templates.emails.password', ['token' => csrf_token()], function ($message) use ($email) {
            $message->from('noreply@laptopstartup.com', 'Your Password Reset Link');
            $message->to($email)->subject('Your Password Reset Link');
        });
    }

    private function store($email)
    {
        if (DB::table('password_resets')->where('email', $email)->count() > 0) {
            DB::table('password_resets')->where('email', $email)->delete();
        }


        return DB::table('password_resets')->insert([
            'email' => $email,
            'token' => csrf_token(),
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Reset password functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
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

    public function checkToken(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|exists:password_resets,token',
        ]);
        if (DB::table('password_resets')->where('token', $request->input('token'))->first())
            return response([
                'status' => true,
                'email' => DB::table('password_resets')->where('token', $request->input('token'))->first()->email
            ]);
        else
            return response(['status' => false]);

    }

}
