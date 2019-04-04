<?php

namespace App\Http\Middleware;

use Closure;

class langmiddleware
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
        if(auth()->check()){
            if(auth()->user()->lang != null){
                app()->setLocale(auth()->user()->lang);    
            }else{
                app()->setLocale(get_settings()->main_lang); 
            }
                
        }else{
             app()->setLocale(get_settings()->main_lang);
        }
        return $next($request);
    
    }
}
