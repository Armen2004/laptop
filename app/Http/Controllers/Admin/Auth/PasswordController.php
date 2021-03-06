<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Admin\AdminBaseController;

class PasswordController extends AdminBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }
}
