<?php

namespace App\Http\Middleware;

use Closure,Auth;

class CheckLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->level == 1 && Auth::user()->status == 'on') {
                return $next($request);
            }
        }
        
        return redirect()->route('auth.get.login');
        
    }
}
