<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission = null)
    {
       
        if(!Auth::guard('web')->check()){
            return redirect('/dashboard/login');
        }
        return $next($request);
    }
}
