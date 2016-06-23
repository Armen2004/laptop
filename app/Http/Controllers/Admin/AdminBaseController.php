<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    /**
     * @var mixed
     */
    protected $user;

    /**
     * AdminBaseController constructor.
     */
    public function __construct()
    {
        $this->user = auth()->guard('admin');
        view()->share('admin', $this->user->user());
    }
}
