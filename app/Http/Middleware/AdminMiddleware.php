<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * @var mixed
     */
    protected $admin;

    /**
     * AdminMiddleware constructor.
     */
    public function __construct()
    {
        $this->admin = auth()->guard('admin');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->admin->check()) {
            return $next($request);
        }
        return redirect()->back();
    }
}
