<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Invest;

use Auth;
class InvestController extends Controller
{
    public function getInvest(Request $Request)
    {
     
        return view(template().".pages.invest.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'name',
            2 => 'amount',
            3 => 'note', 
            4 => 'address',
            5 => 'date',
            6 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Invest::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Invest = Invest::where('idUser','=',$idUser)
                    ->whereBetween('date',[$dateBegin,$dateEnd ])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Invest = Invest::where('idUser','=',$idUser)
                    ->whereBetween('date',[$dateBegin,$dateEnd ])
                    ->Where(function($query)use($search){
                        $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('address', 'LIKE',"%{$search}%")
                        ->orWhere('note', 'LIKE',"%{$search}%")
                        ->orWhere('date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Invest->count();
                }
        }else{
            $totalData =  Invest::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Invest = Invest::where('idUser','=',$idUser)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Invest = Invest::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
               
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('address', 'LIKE',"%{$search}%")
                    ->orWhere('note', 'LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                 $totalFiltered =$Invest->count();
            }
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Invest   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Invest::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Invest = new Invest();
        $Invest->idUser = idUser();
        $Invest->name= $Request->name;
        $Invest->amount= $Request->amount;
        $Invest->date = $Request->date;
        $Invest->note = $Request->note;
        $Invest->address = $Request->address;
        if($Invest->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Invest =  Invest::find((int)$Request->id);
        $Invest->idUser = idUser();
        $Invest->name= $Request->name;
        $Invest->amount= $Request->amount;
        $Invest->date = $Request->date;
        $Invest->note = $Request->note;
        $Invest->address = $Request->address;
        if($Invest->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Invest =  Invest::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Invest){
            return JSON3($Invest,true,'');
        }else{
            return JSON3($Invest,false,'');
        }

    }

}