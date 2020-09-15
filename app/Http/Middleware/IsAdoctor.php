<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdoctor
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

        if(Auth::user()){
            if(Auth::user()->type == 'doctor')
            {  return $next($request);}
            else{
            return redirect('home');
        }
        }
       return redirect('login');
    }
}
