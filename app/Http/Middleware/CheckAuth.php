<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
class CheckAuth
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
        if($Request->ajax()){
            if (Auth::check()) {
                return $next($Request);
            }else{
                return JSON2(false,'Session');
            }
        }else{
            if (Auth::check()) {
                if(Auth::user()->status==1){
                    return redirect()->route('login');
                }else{
                    return $next($Request);
                }
            }else {
                return redirect()->route('login');
            }
        }
        
    }
}
