<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Wallet;
use App\Models\TypeWallet;
use Auth;
use DB;
class WalletController extends Controller
{
    public function getWallet(Request $Request)
    {
        return view(template().".pages.wallet.index",['typewallet'=>TypeWallet::get()]);
    }
    public function getTotal()
    {
      
       return JSON1(surplus());
    }
    public function getDatatable(Request $Request)
    {
        $Wallet = $this->datatable();
        $json_data = array(
            "data"  => $Wallet   
        );
        echo json_encode($json_data); 
    }
    public function postDelete(Request $Request)
    {
        $result =Wallet::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {
        $Wallet = new Wallet();
        $Wallet->idUser = idUser();
        $Wallet->name= $Request->name;
        $Wallet->idTypeWallet = $Request->idTypeWallet;
        $Wallet->note = $Request->note;
        $Wallet->amount = $Request->amount;
        if($Wallet->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
    }
    public function postUpdate(Request $Request)
    {
        $Wallet =  Wallet::find((int)$Request->id);
        $Wallet->idUser = idUser();
        $Wallet->name= $Request->name;
        $Wallet->idTypeWallet = $Request->idTypeWallet;
        $Wallet->note = $Request->note;
        $Wallet->amount = $Request->amount;
        $Wallet->updated_at = date("Y-m-d H:i:s");
        if($Wallet->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Wallet =  Wallet::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Wallet){
            return JSON3($Wallet,true,'');
        }else{
            return JSON3($Wallet,false,'');
        }

    }
    public function datatable()
    {
        $idUser = idUser();
        $SQL="SELECT * FROM (SELECT * FROM wallet AS wallet_PARENT LEFT JOIN"
                ."(SELECT SUM(sumCOST) AS sumCOST, idWallet  FROM ("
                    ." SELECT SUM(amount) AS sumCOST , idWallet "
                    ." FROM event"
                    ." UNION ALL"
                    ." SELECT SUM(amount) AS sumCOST, idWallet "
                    ." FROM shopping "
                    ." UNION ALL"
                    ." SELECT SUM(amount) AS sumCOST, idWallet "
                    ." FROM cost "
                    ." UNION ALL"
                    ." SELECT SUM(amount) AS sumCOST, idWallet "
                    ." FROM lendloan "
                    ." UNION ALL"
                    ." SELECT SUM(amount) AS sumCOST, idWallet "
                    ." FROM invest "
                    ." GROUP BY idWallet      "
                .") AS TBN GROUP BY TBN.idWallet"
                .") AS child ON "
                ." child.idWallet = wallet_PARENT.id) AS TEST "
                ." LEFT JOIN (SELECT SUM(cumINCOME) AS cumINCOME, idWallet FROM ("
                    ." SELECT SUM(amount) AS cumINCOME, idWallet  FROM salary GROUP BY idWallet"
                    ." UNION ALL"
                    ." SELECT SUM(amount) AS cumINCOME, idWallet  FROM debt GROUP BY idWallet) AS TBCHILD"
                .") AS TBS "
                ." ON TBS.idWallet = TEST.id "
                ." WHERE idUser = ".$idUser."";
   
        return $data=  DB::select(DB::raw($SQL)); 
    }
}
