<?php

namespace App\Http\Controllers\Api;

use File;
use App\User;
use Flow\Config;
use Carbon\Carbon;
use App\UploadHelperClass;
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
                'userInfo' => $this->user->user()->with('userType')->where('id', $this->user->id())->first()
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

    /**
     * Send Email to user
     *
     * @param $email
     * @return mixed
     */
    private function send($email)
    {
        return Mail::send('templates.emails.password', ['token' => csrf_token()], function ($message) use ($email) {
            $message->from('noreply@laptopstartup.com', 'Your Password Reset Link');
            $message->to($email)->subject('Your Password Reset Link');
        });
    }

    /**
     * @param $email
     * @return mixed
     */
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

    /**
     * Check token before restore user password
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
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

    /**
     * Change user avatar
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function changeAvatar(Request $request)
    {
        $temp_dir = public_path('tmp');
        try {
            $config = (new Config())->setTempDir($temp_dir);

            $file_location = $temp_dir . '/' . $request->input('flowFilename');

            if (\Flow\Basic::save($file_location, $config, new \Flow\Request())) {

                $user = User::findOrFail($this->user->id());
                $oldImage = $user->image;
                $user->image = (new UploadHelperClass)->uploadImageFlow($file_location, 'users', $oldImage);
                $user->save();
                File::cleanDirectory($temp_dir);
                return response(['message' => "Profile image updated successfully.", 'image' => $user->image], 200);
            } else {
                return response([], 204);
            }
        } catch (\Exception $e) {
            throw new \Exception(sprintf("Error saving image %s", $e->getMessage()));
        }
    }

}
