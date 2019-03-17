<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsSecratry
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
         if(Auth::user()->role != 3){
            if(Auth::user()->role == 2){
                return redirect('/dashboard/doctor/index');
            }else if(Auth::user()->role == 1){
                return redirect('/dashboard/admin/index');
            }
        }
        return $next($request);
    }
}
