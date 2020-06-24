<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
class ProfileController extends Controller
{
    public function getProfile(Request $Request)
    {
        //  return view('AppXeTai.pages.home.home');
         return view(template().'.pages.profile.profile',['users'=>Auth::user()]);
    }
    public function update_avatar($Request)
    {
        $file      = $Request->file('file');
        $filename  = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $picture   = date('Y-m-d-H-i-s').'-avatar.'.$extension;
        $nameFile  =  Auth::user()->avatar;
        $folder = 'users'.Auth::user()->id;
        if($nameFile ==NULL||empty($nameFile )){
            
            $Users = Users::where('id','=',Auth::user()->id)->update(['avatar' =>$picture]);
            if($Users){
                $file->move(public_path("/data/users/{$folder}/"), $picture);
                return true;
            }else{
                return false;
            }
        }else{
            $Users = Users::where('id','=',Auth::user()->id)->update(['avatar' =>$picture]);
            if($Users){
                File::delete(public_path("/data/users/{$folder}/".$nameFile));
                $file->move(public_path("/data/users/{$folder}/"), $picture);
                    return true;
            }else{
                    return false;
            }
        }
    }
    public function uploadFile(Request $Request)
    {        
        if($this->update_avatar($Request)){
            return JSON2(true,"Cập Nhật Hình Đại Diện Thành Công");
        }
        else{
           return JSON2(false,"Cập Nhật Hình Đại Diện Không Thành Công !");
        }
    }
    public function postProfile(Request $Request)
    {
        $isCheckEmail = Users::where('email','=',$Request->email)
                        ->where('id','!=',Auth::user()->id)->first();
        if($isCheckEmail){
            return JSON2(false,'Email đã tồn tại vui lòng nhập Email khác !!');
        }else{
            $Users =  Users::find(Auth::user()->id);
            $Users->user_type = $Request->user_type;
            $Users->full_name =$Request->full_name;
            $Users->email =$Request->email;
            $Users->sex = $Request->sex;
            $Users->introduce =$Request->introduce;
            $Users->birthday =$Request->birthday;
            $Users->address_1 =$Request->address_1;
            $Users->phone_number =$Request->phone_number;
            if( $Users->save()){
                return JSON2(true,'Cập nhật thông tin thành công !!');
            }else{ 
                return JSON2(false,'Cập nhật thông tin không thành công !!');
            }
        }
    }

}