<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Roles;
class CheckMBSPMS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request ,Closure $next,$data=null)
    {   
            $roles =  collect(json_decode(Auth::user()->permission));
            if(Auth::user()->type=='admin'){
                return $next($request);
            }else{
                if($request->ajax()){
                    if($roles->contains($data)){
                        return $next($request);
                    }else{
                        return response(JSON3('',false,'Bạn không có quyền sử dụng chức năng này !'));
                    }
                }else{
                    if($roles->contains($data)){
                        return $next($request);
                    }else{
                        return redirect()->route('404');  
                    }
                }
            }
           
    }
}
