<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Roles;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request ,Closure $next,$permission=null)
    {   
        // return $next($request);
            $roles =  collect(json_decode(Roles::where('id','=',Auth::user()->idRoles)->first()->permission));
            if($request->ajax()){
                if($roles->contains($permission)){
                    return $next($request);
                }else{
                    return response(JSON3('',false,'Bạn không có quyền sử dụng chức năng này !'));
                }
            }else{
                if($roles->contains($permission)){
                    return $next($request);
                }else{
                    return redirect()->route('admin_404');  
                }
            }
    }
}
