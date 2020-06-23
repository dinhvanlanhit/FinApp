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
    $sumWallet=$sumWallet-$sumEvent;
    $sumWallet=$sumWallet-$sumShopping;
    $sumWallet=$sumWallet-$sumCost;
    $sumWallet=$sumWallet+$sumSalary;
    return $sumWallet;


//    $result = \DB::table('users')->select('select * from users')->get();
// dd($result);


//     SELECT *,amount - child.sumUSED AS surplus   FROM wallet AS wallet_PARENT,
// (
// 	SELECT SUM(sumUSED) AS sumUSED, idWallet  FROM (
	
// 		SELECT SUM(amount) AS sumUSED, idWallet 
// 		FROM event 
// 		UNION ALL
// 		SELECT SUM(amount) AS sumUSED, idWallet 
// 		FROM shopping 
// 		UNION ALL
// 		SELECT SUM(amount) AS sumUSED, idWallet 
// 		FROM cost 
		
// 		GROUP BY idWallet
// 	) AS TBN GROUP BY TBN.idWallet
// ) AS child WHERE child.idWallet = wallet_PARENT.id
}
function getWallet()
{
    return \App\Models\Wallet::where('idUser','=',\Auth::user()->id)->get();
}

function deleteFile($file)
{
	if (file_exists(base_path("{$file}"))) {
		File::delete(base_path("{$file}"));
	}
}
function uploadFile($File,$rootFile,$url)
{
    $fileName = NULL;
    if ($File != NULL) {
        $filenameRoot  = $File->getClientOriginalName();
        $extension = $File->getClientOriginalExtension();
        $fileName   = $filenameRoot.'-'.date('Y-m-d-H-i-s') . "." . $extension;
        if (!empty($rootFile) || $rootFile != NULL || $rootFile != '') {
            if (file_exists(base_path("{$rootFile}"))) {
                File::delete(base_path("{$rootFile}"));
                $File->move(base_path("{$url}"), $fileName);
                return  $url.'/'.$fileName;
            } else {
                $File->move(base_path("{$url}"), $fileName);
                return  $url.'/'.$fileName;
            }
        } else {
            $File->move(base_path("{$url}"), $fileName);
            return  $url.'/'.$fileName;
        }
    }
    return $fileName;
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