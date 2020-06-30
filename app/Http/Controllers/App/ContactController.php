<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use Auth;
use Mail;
use GuzzleHttp\Client;
class ContactController extends Controller
{
    public function getContact(Request $Request)
    {
        return view(template().".pages.contact.contact");
    }
    public function postContact(Request $Request)
    { 
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
            $Contact = new Contact();
            $Contact->idUser = Auth::user()->id;
            $Contact->full_name = $Request->post('full_name');
            $Contact->email = $Request->post('email');
            $Contact->phone_number = $Request->post('phone_number');
            $Contact->msg = $Request->post('msg');
            $Contact->status = 0;
            $Contact->status_name = 'Chưa Xử Lý';
            if($Contact->save()){
                $emailTo = setting()->email_receive;
                $mailfb= array(
                    'full_name' => $Request->post('full_name'),
                    'email' => $Request->post('email'),
                    'phone_number' => $Request->post('phone_number'),
                    'msg' => $Request->post('msg')
                );
                try{
                    Mail::send(template().'.pages.contact.mailfb',$mailfb,function ($message) use ($emailTo) {
                        $message->to($emailTo, 'Recovery')->subject('Liên Hệ');
                    });
                }
                catch(Exception $ex)
                {
                    return JSON2(true,'Gửi Thành công');
                }
                return JSON2(true,'Gửi Thành công');
            }else{
                return JSON2(false,'Gửi Không Thành công');
            }
        }else{
            return JSON2(false,'Thao tác nay không dành cho người máy');
        }
       
    }

}