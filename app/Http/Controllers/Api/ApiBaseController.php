<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
    /**
     * @var mixed
     */
    protected $user;

    /**
     * ApiBaseController constructor.
     */
    public function __construct()
    {
        $this->user = auth()->guard('user');
        //view()->share('user', $this->user->user());
    }
}
