<?php
function RandomString($length = 6)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function icon_w()
{
    $rs = 0;
    if (file_exists(base_path('public_html/SytemFinApp/icon').'/'.setting()->icon)) {
      $data =  getimagesize(base_path('public_html/SytemFinApp/icon').'/'.setting()->icon);
      $rs = $data[0];
    }
    return  $rs;
}
function icon_h()
{
    $rs = 0;
    if (file_exists(base_path('public_html/SytemFinApp/icon').'/'.setting()->icon)) {
      $data =  getimagesize(base_path('public_html/SytemFinApp/icon').'/'.setting()->icon);
      $rs = $data[1];
    }
    return  $rs;
}
function checkUsers()
{
    $type =  Auth::user()->type;
    $users  = \App\Models\Users::where('id','=',Auth::user()->parent_id)->first();
    if($users){
        if($users->status_payment==0){
            return false;
        }else{
            return true;
        }
    }else{
        if(Auth::user()->status_payment==0){
            return false;
        }else{
            return true;
        }
    }
    
    
}

function getExpiryDate()
{
        $users = \Auth::user();
        $idUser = null;
        $type = null;
        if($users->type=='membership'){
            $idUser = $users->parent_id;
            $type =  'member';
        }
        else{
            $idUser = $users->id;
            $type = $users->type;
        }
        $SQL = "SELECT * FROM users AS users_PARENT LEFT JOIN ";
        $SQL .="( SELECT SUM(numberMonth) AS sumMonth , idUser  ";
        $SQL .=" FROM users_payment ";
        $SQL .=" GROUP BY idUser    ";
        $SQL .=") AS child ON ";
        $SQL .= " child.idUser = users_PARENT.id ";
        $SQL .= " WHERE type = '{$type}' ";
        $SQL .= " AND id = {$idUser} ";
        $result  =  DB::select(DB::raw($SQL));
        $today = $result[0]->date;
        $sumMonth = $result[0]->sumMonth==null?0:$result[0]->sumMonth;
        $month = strtotime(date("Y-m-d", strtotime($today)) . " +$sumMonth month");
        $month = strftime("%Y-%m-%d", $month);
        return $month;
}
function idUser()
{
    $idUser = null;
    if(\Session::get('view_users')!=null){
        $idUser =  \Session::get('view_users');
    }else{
        if(\Auth::user()->type=='membership')
        {
            $idUser =\Auth::user()->parent_id;

        }else{
            $idUser =  \Auth::user()->id;
        } 
    }
    return $idUser;
}
function user()
{
    return \App\Models\Users::where('id','=',idUser())->first();
}
function surplus()
{
    $idUser = idUser();
    $sumWallet  = \App\Models\Wallet::where('idUser','=',$idUser)->sum('amount');
    ///////////////////////////////////////
    $sumEvent = \App\Models\Event::where('idUser','=',$idUser)->sum('amount');
    $sumShopping  = \App\Models\Shopping::where('idUser','=',idUser())->sum('amount');
    $sumCost  = \App\Models\Cost::where('idUser','=',idUser())->sum('amount');
    $sumSalary  = \App\Models\Salary::where('idUser','=',idUser())->sum('amount');
    $sumLendloan  = \App\Models\Lendloan::where('idUser','=',idUser())->sum('amount');
    $sumInvest  = \App\Models\Invest::where('idUser','=',idUser())->sum('amount');
    $sumMyEvent  = \App\Models\MyEvent::where('idUser','=',idUser())->sum('amount');
    
    $sumDebt  = \App\Models\Debt::where('idUser','=',idUser())->where('idWallet','!=','null')->sum('amount');



    $sumWallet=$sumWallet-$sumEvent;
    $sumWallet=$sumWallet-$sumShopping;
    $sumWallet=$sumWallet-$sumCost;
    $sumWallet=$sumWallet+$sumSalary;
    $sumWallet=$sumWallet-$sumLendloan;
    $sumWallet=$sumWallet-$sumInvest;
    $sumWallet=$sumWallet+$sumMyEvent;
    $sumWallet=$sumWallet+$sumDebt;
    return $sumWallet;
}
function  activeOpenMenu($array = array())
{
    $class = "";
    foreach ($array as $item) {
        if (Request::routeIs($item)) {
            $class = "active menu-open";
        }
    }
    return $class;
}

function  ActiveMenu($nameRoute = null)
{
    return Request::routeIs($nameRoute) ? 'active' : '';
}
function getWallet()
{
    $rs = \App\Models\Wallet::where('idUser','=',idUser())->get();
    return $rs;
}

function deleteFile($file)
{
	if (file_exists(base_path("{$file}"))) {
		File::delete(base_path("{$file}"));
	}
}

function  JSON1($data=null)
{
    $Responses = new \stdClass;
    $Responses->data=$data;
    $Responses->icon="success";
    return json_encode($Responses);
}
function  JSON2($type=false,$messages=null)
{
    $Responses = new \stdClass;
    $Responses->statusBoolen=null;
    $Responses->statusNumber=null;
    $Responses->statusType=null;
    $Responses->messages=null;
    $Responses->icon=null;
    if($type==true)
    {
            $Responses->statusBoolen=$type;
            $Responses->statusNumber=1;
            $Responses->statusType='success';
            $Responses->messages=$messages;
            $Responses->icon="success";
    }else{
            $Responses->statusBoolen=$type;
            $Responses->statusNumber=0;
            $Responses->statusType='error';
            $Responses->messages=$messages;
            $Responses->icon="error";
    }
    return json_encode($Responses);
}
function  JSON3($data=null,$type=false,$messages=null)
{
    $Responses = new \stdClass;
    $Responses->statusBoolen=null;
    $Responses->statusNumber=null;
    $Responses->statusType=null;
    $Responses->messages=null;
    $Responses->data=null;
    $Responses->icon=null;
    if($type==true)
    {
            $Responses->statusBoolen=$type;
            $Responses->statusNumber=1;
            $Responses->statusType='success';
            $Responses->messages=$messages;
            $Responses->data=$data;
            $Responses->icon="success";
    }else{
            $Responses->statusBoolen=$type;
            $Responses->statusNumber=0;
            $Responses->statusType='error';
            $Responses->messages=$messages;
            $Responses->data=$data;
            $Responses->icon="error";
    }
    return json_encode($Responses);

}
function countWallet()
{
   return $count =  \App\Models\Wallet::where('idUser','=',idUser())->count();
   
}
function template()
{
    $agent = new \Jenssegers\Agent\Agent;
    $result = $agent->isDesktop();
    return "ClientDesktops";
    // $result  = false;
    // if ($result){
    //     return "ClientDesktops";
    // } 
    // else{
    //     return "AdminMobiles";
    // }
}
function templateAdminApp()
{
    return "AdminApp";
}
function setting()
{
   return \App\Models\Settings::find(1);
}
function countContact()
{
    return \App\Models\Contact::where('status','=',0)->count();
}