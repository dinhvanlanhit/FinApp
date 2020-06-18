<?php

namespace App\Http\Controllers\App;

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
       return view(template().'.pages.login.login');
    }
    public function postLogin(Request $Request)
    {
        $icon = '<i class="fas fa-exclamation-circle"></i>';
        $error = new  \stdClass;
        $error->idCompanies = null;
        $error->email = null;
        $error->password = null;
        if($Request->idCompanies==null){
            $error->idCompanies = $icon.' '.'Vui lòng nhập ID !';
        }
        if($Request->email==null){
           $error->email=$icon.' '.'Vui lòng nhập Email !';
        }
        if($Request->password==null){
            $error->password = $icon.' '.'Vui lòng nhập Password !';
        }
        if($Request->idCompanies==null||$Request->email==null||$Request->password==null){
            return JSON2(false,$error);
        }
        // Kiểm tra ID công ty
        $checkCompanies = Companies::where('id','=',$Request->idCompanies)->first();
        if(!$checkCompanies){
            $error->idCompanies = $icon.' '.'ID không đúng !';
            return JSON2(false,$error);
        }
        // Kiểm tra Email
        $checkUser = Users::where('email','=',$Request->email)->first();
        if(!$checkUser){
            $error->email = $icon.' '.'Email không đúng !';
            return JSON2(false,$error);
        }
        $credentials = $Request->only('idCompanies','email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status==0){
                return JSON2(true,$error);
            }else{
                return JSON2(false,$error);
            }
        }else {
            $error->password = $icon.' '.'Password không đúng !';
            return JSON2(false,$error);
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