<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
class CheckMemberShip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $Request ,Closure $next)
    {   
        if(Auth::user()->type ==='membership'){
            return redirect()->route('404');
        }else{
            return $next($Request);
        }
    }
}
