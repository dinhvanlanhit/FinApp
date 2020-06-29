<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
class CheckAuthSystem
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
                if(Auth::user()->status==0&&Auth::user()->type=='admin'){
                    return $next($Request);
                }else{
                    return JSON2(false,'Session');
                }
            }else{
                return JSON2(false,'Session');
            }
        }else{
            if (Auth::check()) {
                if(Auth::user()->status==0&&Auth::user()->type=='admin'){
                    return $next($Request);
                }else{
                    return redirect()->route('login');
                }
            }else {
                return redirect()->route('login');
            }
        }
        
    }
}
