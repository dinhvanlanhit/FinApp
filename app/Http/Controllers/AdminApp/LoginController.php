<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use App\Models\Users;
use App\Models\Companies;
class LoginController extends Controller
{
    public function getLogin(Request $Request)
    {
       return view(templateAdminApp().'.pages.login.login');
    }
    public function postLogin(Request $Request)
    {
        $credentials = $Request->only('name','email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status==0&&Auth::user()->type!='member'){
                return JSON2(true,"");
            }else{
                return JSON2(false,"Tài khoản của bạn đã bị khóa");
            }
        }else {
            return JSON2(false,'Email hoặt mật khẩu không đúng !');
        }
    }
    public function getLogout(Request $Request)
    {
        if(Auth::logout()){
            return redirect()->route('admin_login');
        }else {
            return redirect()->route('admin_login');
        }
    }

}