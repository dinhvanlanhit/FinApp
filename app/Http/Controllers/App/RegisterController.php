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
                        $Users = Users::find($Users->id);
                        $Users->idKey = $Users->id.''.RandomString(5);
                        $Users->save();
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
    public function generateRandomString($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getForgotPassword(Request $request)
    {
        return view(template().'.pages.forgot.forgot');
    }
    public function sendEmail(Request $request)
    {
        $Users = Users::where('email', '=', $request->email)->first();
        $remember_token = $this->generateRandomString(6);
        $remember_tokenHash = \Hash::make($remember_token);
        if($Users){
            $emailTo = $request->email;
            Session::put('EMAIL',$emailTo);
            Session::put('remember_token',$remember_tokenHash);
            Users::where('email', '=', $request->email)->update(['remember_token' => $remember_tokenHash]);
            $data =array(
                'remember_token'=>$remember_token,
                'full_name'=>$Users->full_name,
                'route'=>route('password').'?email='.$request->email.'&token='.$remember_tokenHash
            );
            try{
                Mail::send(template().'.pages.forgot.mail-template',$data,function ($message) use ($emailTo,$remember_token) {
                    $message->to($emailTo, 'Recovery')->subject($remember_token." là mã phục hồi tài khoản FinApp của bạn");
                });
                return JSON2(true,"");
            }
            catch(Exception $ex)
            {
                return JSON2(false,"Gửi email xác nhận không thành công !");
            }
           
        }else{
            return JSON2(false,'Email của bạn không tồn tại !');
        }
    }
    public function getRecovercode(Request $Request)
    {
        $rs = Users::where('email', '=',Session::get('EMAIL'))->where('remember_token','=',Session::get('remember_token'))->first();
        if($rs){
            return view(template().'.pages.forgot.recover-code',['email'=>$rs->email]);
        }else{
            return redirect()->route('forgot-password');
        }
        
    }
    public function postRecovercode(Request $request)
    {
        $rs = Users::where('email', '=',$request->email)->first();
        if($rs){
            if (\Hash::check($request->remember_token, $rs->remember_token)){
                Session::put('EMAIL',NULL);
                Session::put('remember_token',NULL);
                Session::put('id_session',$rs->id);
                Users::where('id', '=', $rs->id)->update(['remember_token' =>NULL]);
                return JSON2(true,"");
            }else{
                return JSON2(false,'Mã xác nhận không hợp lệ !');
            }
        }else{
            return JSON2(false,'Mã xác thực đã hệt hạn !');
        }
    }
    public function getPassword(Request $request)
    {
        if($request->email!=null&&$request->token!=null){
            $rs = Users::where('email', '=',$request->email)->where('remember_token','=',$request->token)->first();
            if($rs){
                Session::put('EMAIL',NULL);
                Session::put('remember_token',NULL);
                Users::where('id', '=', $rs->id)->update(['remember_token' =>NULL]);
                Session::put('id_session',$rs->id);
                return view(template().'.pages.forgot.password');
            }else{
                return redirect()->route('forgot-password');
            }
        }else{
            if(Session::get('id_session')!=null){
                return view(template().'.pages.forgot.password');
            }else{
                return redirect()->route('forgot-password');
            }
        }
       
        
       
    }
    public function postPassword(Request $request)
    {
        if(Session::get('id_session')!=null){
            if ($request->password . "" === "" || $request->re_password . "" === "") 
            {
                return JSON2(false, 'Vui lòng nhập đầy đủ thông tin');
            }else{
                if ($request->password === $request->re_password) {
                    $Users =  Users::find((int)Session::get('id_session'));
                    $Users->password =  \Hash::make($request->password);
                    $Users->remember_token = NULL;
                    if($Users->save()){
                        Session::put('EMAIL',NULL);
                        Session::put('remember_token',NULL);
                        Session::put('id_session',NULL);
                        return JSON2(true, 'Lấy lại mật khẩu hoàn tất');
                    }else{
                        return JSON2(false, 'Hệ thống lỗi vui lòng thục hiện lại trong vài phúc sau !');
                    }
                    
                } else {
                    return JSON2(false, 'Mật khẩu mới không khớp !');
                }
            }
        }else{
            return JSON2(false,'Mã xác thực đã hệt hạn !');
        }
        
    }
}