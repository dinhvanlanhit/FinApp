<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use App\Models\Users;
class RegisterController extends Controller
{
    public function getRegister(Request $Request)
    {
       return view(template().'.pages.register.register');
    }
    public function postRegister(Request $Request)
    {
       $isCheckEmail = Users::where('email','=',$Request->email)->count();
       if($isCheckEmail>0){
           return JSON2(false,"Email này đã đăng ký rồi !");
       }else{
           if($Request->password!=$Request->confirm_password){
                return JSON2(false,"Mật khẩu xác nhận không khớp !");
           }else{
                $Users = new Users();
                $Users->user_type = $Request->user_type;
                $Users->full_name = $Request->full_name;
                $Users->email = $Request->email;
                $Users->password = bcrypt($Request->password);
                if($Users->save()){
                    return JSON2(true,"Đăng ký thành công !");
                }else{
                    return JSON2(false,"Đăng ký không thành công !");
                }
              
           }
       }
    }
    public function getForgotPassword(Request $Request)
    {
        return view(template().'.pages.forgot.forgot');
    }

}