<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class IsClient
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
                if(auth()->user()->type_user_id==3){
                     return $next($request);
                }    
            } 
            return redirect()->route('login')->withMessage("You don't have organizer access");
        } catch (Exception $e) {
            return redirect()->route('login')->withMassage("You don't have organizer access");
        }
   
}
}
