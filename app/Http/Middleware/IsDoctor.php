<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsDoctor
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
        if(Auth::user()->role != 2){
            if(Auth::user()->role == 1){
                return redirect('/dashboard/admin/index');
            }else if(Auth::user()->role == 3){
                return redirect('/dashboard/secratry/profile');
            }
        }
        return $next($request);
    }
}
