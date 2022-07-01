<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        return $next($request);
        if (Auth::guard($guard)->check() && Auth::user()->role->id==1) {
            return redirect()->route('admin.home');
        }

        elseif (Auth::guard($guard)->check() && Auth::user()->role->id==2) {
            return redirect()->route('\home');
        }

        
    }
}
