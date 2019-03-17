<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsFR
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
        if(get_second_role(Auth::user()->id) != 3){
            if(get_second_role(Auth::user()->id) == 1){
                return redirect('/dashboard/admin/index');
            }else if(get_second_role(Auth::user()->id) == 2){
                return redirect('/dashboard/hr/index');
            }
        }
        return $next($request);
    }
}
