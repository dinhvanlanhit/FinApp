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

    $sumDebt  = \App\Models\Debt::where('idUser','=',\Auth::user()->id)->where('idWallet','!=','null')->sum('amount');

    $sumWallet=$sumWallet-$sumEvent;
    $sumWallet=$sumWallet-$sumShopping;
    $sumWallet=$sumWallet-$sumCost;
    $sumWallet=$sumWallet+$sumSalary;
    $sumWallet=$sumWallet-$sumLendloan;
    $sumWallet=$sumWallet-$sumInvest;
    $sumWallet=$sumWallet+$sumDebt;
    return $sumWallet;


    // CREATE DEFINER=`root`@`localhost` PROCEDURE `datatable_wallet`(
    //     IN `$search` VARCHAR(255),
    //     IN `$limit` VARCHAR(50),
    //     IN `$start` VARCHAR(50),
    //     IN `$order` VARCHAR(50),
    //     IN `$dir` VARCHAR(50)
    // )
    // LANGUAGE SQL
    // NOT DETERMINISTIC
    // CONTAINS SQL
    // SQL SECURITY DEFINER
    // COMMENT ''
    // BEGIN
    //     DECLARE xSQL  VARCHAR(2000);
    //     SET xSQL = "SELECT * FROM (SELECT * FROM wallet AS wallet_PARENT,
            // (
            //     SELECT SUM(sumCOST) AS sumCOST, idWallet  FROM (
            //     SELECT SUM(amount) AS sumCOST , idWallet 
            //     FROM event
            //     UNION ALL
            //     SELECT SUM(amount) AS sumCOST, idWallet 
            //     FROM shopping 
            //     UNION ALL
            //     SELECT SUM(amount) AS sumCOST, idWallet 
            //     FROM cost 
            //     UNION ALL
            //     SELECT SUM(amount) AS sumCOST, idWallet 
            //     FROM lendloan 
            //     UNION ALL
            //     SELECT SUM(amount) AS sumCOST, idWallet 
            //     FROM invest 
            //     GROUP BY idWallet      
            // ) AS TBN GROUP BY TBN.idWallet
            // ) AS child WHERE 
            // child.idWallet = wallet_PARENT.id) AS TEST
            // LEFT JOIN (SELECT SUM(TOTAL_S) AS TOTAL_S, idWallet FROM (
            //     SELECT SUM(amount) AS TOTAL_S, idWallet  FROM salary GROUP BY idWallet
            //     UNION ALL
            //     SELECT SUM(amount) AS TOTAL_S, idWallet  FROM debt GROUP BY idWallet) AS TBCHILD
            // ) AS TBS 
            // ON TBS.idWallet = TEST.id
    //     IF ($search != '' ) THEN
    //         SET xSQL = CONCAT(xSQL," AND 
    //                 wallet_PARENT.name LIKE N'%",$search,"%'
    //                 OR wallet_PARENT.amount LIKE N'%",$search,"%'
    //                 OR wallet_PARENT.note LIKE N'%",$search,"%'
    //                 OR wallet_PARENT.created_at LIKE N'%",$search,"%'
    //         ");
    //     END IF;
    //     SET xSQL = CONCAT(xSQL," ORDER BY ",$dir," ",$order," ");
    //     SET @V_SQL = xSQL;
    //     PREPARE STM FROM @V_SQL;
    //     EXECUTE STM;
    //     DEALLOCATE PREPARE STM;
        
    
        
        
    // END
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
function templateAdminApp()
{
    return "AdminApp";
}