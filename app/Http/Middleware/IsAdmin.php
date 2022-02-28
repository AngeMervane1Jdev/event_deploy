<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {

            if(auth()->user()!=null)
            {   
                if(auth()->user()->is_admin==1){
                     return $next($request);
                }    
            } 
            return redirect('auth/login')->with('error',"You don't have admin access");
        } catch (Exception $e) {
            return redirect('auth/login')->with('error',"You don't have admin access");
        }
    }
}
