<?php
function surplus()
{

    return \App\Models\Wallet::where('idUser','=',\Auth::user()->id)->sum('amount');
}
function getWallet()
{
    return \App\Models\Wallet::where('idUser','=',\Auth::user()->id)->get();
}
function insertWallet($id,$new_amount)
{
    $data =  \App\Models\Wallet::find((int)$id);
    
    $data->amount = ($data->amount - $new_amount);
    if($data->save()){
        return \App\Models\Wallet::where('idUser','=',\Auth::user()->id)->sum('amount');
    }else{
        return 0;
    }
  
}
function updateWallet(
    $old_idWallet,
    $new_idWallet,
    $old_amount,
    $new_amount)
{

   
 
    // 1 100,000,000
    // 
    // 2 : 49,000,000
    // 2 : 1,000,000
   
    if($old_idWallet!=$new_idWallet){
        
     
        if($new_amount!=$old_amount)
        {
            $DataOLD = \App\Models\Wallet::find((int)$old_idWallet);
            $DataOLD->amount =  $DataOLD->amount + $old_amount;
            $DataOLD->save();

            $dataAMOUNT =  \App\Models\Wallet::where('id','=',(int)$old_idWallet)->pluck('amount')->first();
      

            $data =  \App\Models\Wallet::find((int)$new_idWallet);

            

            $data->amount  = ($dataAMOUNT - $new_amount)+$old_amount;
            $data->save();

        }else{
            $DataOLD = \App\Models\Wallet::find((int)$old_idWallet);
            $DataOLD->amount =  $DataOLD->amount + $old_amount;
            $DataOLD->save();

            $data =  \App\Models\Wallet::find((int)$new_idWallet);
            $data->amount =  $data->amount - $old_amount;
            $data->save();
        }
    }else{
        $dataAMOUNT =  \App\Models\Wallet::where('id','=',(int)$old_idWallet)->pluck('amount')->first();
        $data =  \App\Models\Wallet::find((int)$old_idWallet);
        if($new_amount!=$old_amount)
        {
            $data->amount  = ($dataAMOUNT - $new_amount)+$old_amount;
        }
        $data->save();
    }
    
}
function deleteWallet($idWallet,$amount)
{
    $data =  \App\Models\Wallet::find((int)$idWallet);
    $data->amount = ($data->amount+$amount);
    $data->save();
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