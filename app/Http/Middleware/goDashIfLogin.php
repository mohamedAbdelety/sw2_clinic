<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class goDashIfLogin
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
        if(Auth::guard('web')->check()){
            if(Auth::user()->role == 1){
                return redirect('/dashboard/admin/index');
            }else if(Auth::user()->role == 2){
                return redirect('/dashboard/doctor/index');
            }else if(Auth::user()->role == 3){
                return redirect('/dashboard/secratry/profile');
            }
        }
        return $next($request);
    }
}
