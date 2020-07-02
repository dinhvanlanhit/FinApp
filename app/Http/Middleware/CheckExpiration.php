<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
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
        if( Auth::user()->status_payment == 0){
            return $next($Request);
        }else{
            if(Auth::user()->type=='admin'){
                return $next($Request);
            }else{

                $type = Users::where('id','=',Auth::user()->parent_id)->pluck('type')->first();
                if($type=='admin'){
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
    }
}
