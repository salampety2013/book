<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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
         //dd(auth('admin') -> user() -> type);
        
        if(auth('admin') -> user() -> type=="admin")
        {
            return $next($request);
        }
        else
        {
          //  return abort(401);
            return redirect()->back();
        }
           
     
      
   }
}

 
 
