<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class IsOrganizer
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
                if(auth()->user()->type_user_id==1){
                     return $next($request);
                }    
            } 
            return redirect('auth/login')->with('error',"You don't have organizer access");
        } catch (Exception $e) {
            return redirect('auth/login')->with('error',"You don't have organizer access");
        }
    }
}
