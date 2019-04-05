<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class frontendMiddleware
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
        if(!Auth::check() &&  get_settings()->status == '3'){
            return redirect('/frontendmaintance');    
        }

        if(get_settings()->status == '2'){
            return redirect('/frontendmaintance');   
        }

        return $next($request);
    }
}
