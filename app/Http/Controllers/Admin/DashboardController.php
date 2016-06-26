<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
