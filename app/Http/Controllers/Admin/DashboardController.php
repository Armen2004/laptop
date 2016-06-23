<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
