<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class maintance
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
        
        if( get_settings()->status == '2'){
                Auth::guard('web')->logout();
                return redirect('dashboard/maintance');
        }

        if( get_settings()->status == '4' && Auth::guard('web')->check() && Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){ // hr
            Auth::guard('web')->logout();
            return redirect('dashboard/maintance');
        }

        if( get_settings()->status == '5' && Auth::guard('web')->check() && Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 3){ // fr
            Auth::guard('web')->logout();
            return redirect('dashboard/maintance');
        }

        if( get_settings()->status == '6' && Auth::guard('web')->check() && Auth::user()->role == 2){ // doctor
            Auth::guard('web')->logout();
            return redirect('dashboard/maintance');
        }

        if( get_settings()->status == '7' && Auth::guard('web')->check() && Auth::user()->role == 3){ // doctor
            Auth::guard('web')->logout();
            return redirect('dashboard/maintance');
        }

        if(Auth::guard('web')->check() && Auth::user()->block == 1){
            Auth::guard('web')->logout();
            return redirect('dashboard/maintance');   
        }

        
        return $next($request);
    }
}
