<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    protected $user;
    
    public function __construct()
    {
        $this->user = auth()->guard('user');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->user->check()) {
            return $next($request);
        }
        return redirect()->back();
    }
}
