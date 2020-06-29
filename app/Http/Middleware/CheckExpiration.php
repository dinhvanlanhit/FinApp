<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
class CheckExpiration
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
        $today = date("Y-m-d");
        if( Auth::user()->status_payment == 0 || Auth::user()->type!='member'){
            return $next($Request);
        }else{
            if (strtotime(getExpiryDate()) >strtotime($today)) {
                return $next($Request);
            } else {
                return redirect()->route('notice_payment');
            }
        }
    }
}
