<?php
function surplus()
{
    $idUser = \Auth::user()->id;
    $sumWallet  = \App\Models\Wallet::where('idUser','=',$idUser)->sum('amount');


    ///////////////////////////////////////
    $sumEvent = \App\Models\Event::where('idUser','=',$idUser)->sum('amount');
    $sumShopping  = \App\Models\Shopping::where('idUser','=',\Auth::user()->id)->sum('amount');
    $sumCost  = \App\Models\Cost::where('idUser','=',\Auth::user()->id)->sum('amount');
    $sumSalary  = \App\Models\Salary::where('idUser','=',\Auth::user()->id)->sum('amount');
    $sumLendloan  = \App\Models\Lendloan::where('idUser','=',\Auth::user()->id)->sum('amount');
    $sumInvest  = \App\Models\Invest::where('idUser','=',\Auth::user()->id)->sum('amount');
    $sumMyEvent  = \App\Models\MyEvent::where('idUser','=',\Auth::user()->id)->sum('amount');
    
    $sumDebt  = \App\Models\Debt::where('idUser','=',\Auth::user()->id)->where('idWallet','!=','null')->sum('amount');



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
    $rs = \App\Models\Wallet::where('idUser','=',\Auth::user()->id)->get();
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
function getExpiryDate()
{
        $users = \Auth::user();
        $SQL = "SELECT * FROM users AS users_PARENT LEFT JOIN ";
        $SQL .="( SELECT SUM(numberMonth) AS sumMonth , idUser  ";
        $SQL .=" FROM users_payment ";
        $SQL .=" GROUP BY idUser    ";
        $SQL .=") AS child ON ";
        $SQL .= " child.idUser = users_PARENT.id ";
        $SQL .= " WHERE type = '{$users->type}' ";
        $SQL .= " AND id = {$users->id} ";
        $result  =  DB::select(DB::raw($SQL)); 
        $today = $result[0]->date;
        $sumMonth = $result[0]->sumMonth==null?0:$result[0]->sumMonth;
        $month = strtotime(date("Y-m-d", strtotime($today)) . " +$sumMonth month");
        $month = strftime("%Y-%m-%d", $month);
        return $month;
}
function template()
{
    $agent = new \Jenssegers\Agent\Agent;
    $result = $agent->isDesktop();
    return "AdminDesktops";
    // $result  = false;
    // if ($result){
    //     return "AdminDesktops";
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