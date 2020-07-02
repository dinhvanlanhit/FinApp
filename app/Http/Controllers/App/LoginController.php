<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Users;
use App\Models\Companies;
class LoginController extends Controller
{
    public function getLogin(Request $Request)
    {
        Session::put('view_users',null);
        return view(template().'.pages.login.login');
    }
    public function postLogin(Request $Request)
    {
        $fieldType = filter_var($Request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = ['email'=>$Request->email,'password'=>$Request->password];
        if($fieldType=='username'){
            $data = ['username'=>$Request->email,'password'=>$Request->password];
        }
        if (Auth::attempt($data)) {
            if(Auth::user()->status==0){
                return JSON2(true,"");
            }else{
                return JSON2(false,"Tài khoản của bạn đã bị khóa");
            }
        }else {
            return JSON2(false,'Tai khoản hoặt mật khẩu không đúng !');
        }
    }
    public function getLogout(Request $Request)
    {
        if(Auth::logout()){
            return redirect()->route('login');
        }else {
            return redirect()->route('login');
        }
    }

}