<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Settings;
use File;
use DB;
class SettingsController extends Controller
{
    public function getSetting(Request $Request)
    {
         return view(templateAdminApp().'.pages.settings.settings',['data'=>Settings::find(1)]);
    }
    function uploadFile($File,$rootFile,$url,$type)
    {
        $fileName = NULL;
        if ($File != NULL) {
            $filenameRoot  = $File->getClientOriginalName();
            $extension = $File->getClientOriginalExtension();
            $fileName   = $type.'-'.date('Y-m-d-H-i-s') . "." . $extension;
            if (!empty($rootFile) || $rootFile != NULL || $rootFile != '') {
                if (file_exists(base_path("{$url}{$rootFile}"))) {
                    File::delete(base_path("{$url}{$rootFile}"));
                    $File->move(base_path("{$url}"), $fileName);
                } else {
                   $File->move(base_path("{$url}"),$fileName);
                }
            } else {
               $File->move(base_path("{$url}"), $fileName);
            }
        }
        return $fileName;
    }
    public function postUpload(Request $Request)
    {
        $File      = $Request->file('file');
        $Settings = null;
        $url = "public_html/SytemFinApp/{$Request->type}/";
        $data = Settings::find(1);
        $rootFile = $data->{$Request->type};
        $data->{$Request->type}= $this->uploadFile($File,$rootFile,$url,$Request->type);
        if($Request->type=='logo'){
            if($data->save()){
                return JSON2(true,'Cập nhật logo thành công ');
            }else{
                return JSON2(true,'Cập nhật logo không thành công ');
            }
        }else{
            if($data->save()){
                return JSON2(true,'Cập nhật icon thành công ');
            }else{
                return JSON2(true,'Cập nhật icon không thành công ');
            }
        }
        
    }
    public function postSetting(Request $Request)
    {
        $data = Settings::find(1);
        $data->title = $Request->title;
        $data->company_name = $Request->company_name;
        $data->address = $Request->address;
        $data->email = $Request->email;
        $data->password = $Request->password;
        $data->phone_number = $Request->phone_number;
        $data->date = $Request->date;
        $data->themes = $Request->themes;
        $data->content_banktransfer = $Request->content_banktransfer;
        $data->content_contact = $Request->content_contact;
        $data->code_fanpage = $Request->code_fanpage;
        $data->googleMap = $Request->googleMap;

        $data->facebook_url = $Request->facebook_url;
        $data->twitter_url = $Request->twitter_url;
        $data->instagram_url = $Request->instagram_url;
        $data->linkedin_url = $Request->linkedin_url;
        $data->vk_url = $Request->vk_url;
        $data->telegram_url = $Request->telegram_url;
        $data->youtube_url = $Request->youtube_url;

        $data->GOOGLE_RECAPTCHA_KEY = $Request->GOOGLE_RECAPTCHA_KEY;
        $data->GOOGLE_RECAPTCHA_SECRET = $Request->GOOGLE_RECAPTCHA_SECRET;
        
        if($data->save()){
            return JSON2(true,"Cập Nhật Thành Công");
        }else{
            return JSON2(false,"Cập Nhật Không Thành Công");
        }
    }
}