<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cost;
use App\Models\TypeCost;
use Auth;
class CostController extends Controller
{
    public function getCost(Request $Request)
    {
        $typecost = TypeCost::get();
        return view(template().".pages.cost.index",['typecost'=>$typecost]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'type_name',
            2 => 'note',
            3 => 'amount',
            4 => 'date', 
            5 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');

        $idTypeCost = $Request->input('idTypeCost');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');

        if(!empty($idTypeCost))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Cost::where('idUser','=',$idUser)->where('idTypeCost','=',$idTypeCost)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Cost = Cost::
                    join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)->where('idTypeCost','=',$idTypeCost)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('cost.*','type_cost.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Cost = Cost::
                    join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)->where('idTypeCost','=',$idTypeCost)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('cost.*','type_cost.type_name')
                    ->Where(function($query)use($search){
                        $query->where('cost.id', 'LIKE', "%{$search}%")
                        ->orWhere('cost.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('cost.amount','LIKE',"%{$search}%")
                        ->orWhere('cost.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Cost->count();
                }
            }else{
                $totalData =  Cost::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)->where('idTypeCost','=',$idTypeCost)
                    ->select('cost.*','type_cost.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)->where('idTypeCost','=',$idTypeCost)
                    ->select('cost.*','type_cost.type_name')
                    ->Where(function($query)use($search){
                        $query->where('cost.id', 'LIKE', "%{$search}%")
                        ->orWhere('cost.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('cost.amount','LIKE',"%{$search}%")
                        ->orWhere('cost.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Cost->count();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Cost::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Cost = Cost::
                    join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('cost.*','type_cost.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Cost = Cost::
                    join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('cost.*','type_cost.type_name')
                    ->Where(function($query)use($search){
                        $query->where('cost.id', 'LIKE', "%{$search}%")
                        ->orWhere('cost.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('cost.amount','LIKE',"%{$search}%")
                        ->orWhere('cost.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Cost->count();
                }
            }else{
                $totalData =  Cost::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)
                    ->select('cost.*','type_cost.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
                    ->where('idUser','=',$idUser)
                    ->select('cost.*','type_cost.type_name')
                    ->Where(function($query)use($search){
                        $query->where('cost.id', 'LIKE', "%{$search}%")
                        ->orWhere('cost.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('cost.amount','LIKE',"%{$search}%")
                        ->orWhere('cost.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Cost->count();
                }
            }
        }
            
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Cost   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Cost::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Cost = new Cost();
        $Cost->idUser = idUser();
        $Cost->idWallet= $Request->idWallet;
        $Cost->idTypeCost = $Request->idTypeCost;
        $Cost->note= $Request->note;
        $Cost->amount = $Request->amount;
        $Cost->date = $Request->date;
        if($Cost->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Cost =  Cost::find((int)$Request->id);
        $Cost->idUser = idUser();
        $Cost->idWallet= $Request->idWallet;
        $Cost->idTypeCost = $Request->idTypeCost;
        $Cost->note= $Request->note;
        
        $Cost->amount = $Request->amount;
        $Cost->date = $Request->date;
        if($Cost->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Cost =  Cost::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Cost){
            return JSON3($Cost,true,'');
        }else{
            return JSON3($Cost,false,'');
        }

    }

}