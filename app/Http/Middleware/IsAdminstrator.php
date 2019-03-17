<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsAdminstrator
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
        if(get_second_role(Auth::user()->id) != 1){
            if(get_second_role(Auth::user()->id) == 2){
                return redirect('/dashboard/hr/index');
            }else if(get_second_role(Auth::user()->id) == 3){
                return redirect('/dashboard/fr/index');
            }
        }
        return $next($request);
    }
}
