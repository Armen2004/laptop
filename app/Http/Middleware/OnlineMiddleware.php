<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class OnlineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        if ($guard == 'admin') {
            Admin::updateActivity(Auth::guard($guard)->user());
        } elseif ($guard == 'user') {
            User::updateActivity(Auth::guard($guard)->user());
        } else {
            return redirect()->back();
        }

        return $next($request);
    }
}
