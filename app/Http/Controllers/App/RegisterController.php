<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use Mail;
use GuzzleHttp\Client;
use App\Models\Users;
use App\Models\UsePayment;
use App\Models\UsersPayment;
class RegisterController extends Controller
{
    public function getRegister(Request $Request)
    {
       return view(template().'.pages.register.register');
    }
    public function postRegister(Request $Request)
    {
        $UsePayment =UsePayment::find(1);
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>setting()->GOOGLE_RECAPTCHA_SECRET,
                    'response'=>$Request->post('g-recaptcha-response')
                 ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        if($body->success){
            $isCheckEmail = Users::where('email','=',$Request->email)->count();
            if($isCheckEmail>0){
                return JSON2(false,"Email này đã đăng ký rồi !");
            }else{
                if($Request->password!=$Request->confirm_password){
                     return JSON2(false,"Mật khẩu xác nhận không khớp !");
                }else{
                     $Users = new Users();
                     $Users->full_name = $Request->full_name;
                     $Users->email = $Request->email;
                     $Users->password = bcrypt($Request->password);
                     $Users->date = date('Y-m-d');
                     $Users->save();
                     if($Users){
                        $Payment = new UsersPayment();
                        $Payment->idUser =  $Users->id;
                        $Payment->idUsePayment= $UsePayment->id;
                        $Payment->numberMonth= $UsePayment->numberMonth;
                        $Payment->amount= $UsePayment->amount;
                        $Payment->note = $UsePayment->note;
                        $Payment->date = date('Y-m-d');
                        $Payment->created_at = date('Y-m-d H:s:i');
                        $Payment->save();
                        $emailTo = setting()->email_receive;
                        $mailfb= array(
                            'full_name' =>  $Request->full_name,
                            'email' =>$Request->email
                        );
                        try{
                            Mail::send(template().'.pages.contact.mailfb',$mailfb,function ($message) use ($emailTo) {
                                $message->to($emailTo, 'Recovery')->subject('Đăng Ký Thành Viên Mới');
                            });
                        }
                        catch(Exception $ex)
                        {
                            return JSON2(false,"Đăng ký không thành công !");
                        }
                        return JSON2(true,"Đăng ký thành công bạn có thế đăng nhập tài khoản vừa đăng ký");
                     }else{
                         return JSON2(false,"Đăng ký không thành công !");
                     }
                   
                }
            }
        }else{
            return JSON2(false,'Thao tác nay không dành cho người máy');
        }



      
    }
    public function getForgotPassword(Request $Request)
    {
        return view(template().'.pages.forgot.forgot');
    }

}