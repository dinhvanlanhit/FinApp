<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Wallet;
use Auth;
class WalletController extends Controller
{
    public function getWallet(Request $Request)
    {
        return view(template().".pages.wallet.index");
    }
    public function getTotal()
    {
      
       return JSON1(surplus());
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'type_name',
            2 => 'name',
            3 => 'amount',
            4 => 'note',
            5 => 'updated_at',
            6 => 'updated_at'
        );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Wallet::where('idUser','=',$idUser)->count();
        $totalFiltered =$totalData;
        if(empty($search)){
                $Wallet = Wallet::join('type_wallet','type_wallet.id','=','wallet.idTypeWallet')
                ->where('wallet.idUser','=',$idUser)
                ->select('wallet.*','type_wallet.type_name')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }else{
                $Wallet = Wallet::join('type_wallet','type_wallet.id','=','wallet.idTypeWallet')
                ->where('wallet.idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('wallet.id', 'LIKE', "%{$search}%")
                    ->orWhere('wallet.name', 'LIKE',"%{$search}%")
                    ->orWhere('wallet.note', 'LIKE',"%{$search}%")
                    ->orWhere('wallet.amount', 'LIKE',"%{$search}%")
                    ->orWhere('type_wallet.type_name', 'LIKE',"%{$search}%")    
                    ->orWhere('wallet.created_at','LIKE',"%{$search}%");
                })
                ->select('wallet.*','type_wallet.type_name')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Wallet   
        );
        echo json_encode($json_data); 
    }
    public function postDelete(Request $Request)
    {
        $result =Wallet::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Wallet = new Wallet();
        $Wallet->idUser = Auth::user()->id;
        $Wallet->name= $Request->name;
        $Wallet->note = $Request->note;
        $Wallet->amount = $Request->amount;
        if($Wallet->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Wallet =  Wallet::find((int)$Request->id);
        $Wallet->idUser = Auth::user()->id;
        $Wallet->name= $Request->name;
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
        $Wallet =  Wallet::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Wallet){
            return JSON1($Wallet);
        }else{
            return JSON1($Wallet);
        }

    }

}