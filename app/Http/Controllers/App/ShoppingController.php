<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Shopping;
use Auth;
class ShoppingController extends Controller
{
    public function getShopping(Request $Request)
    {
        return view(template().".pages.shopping.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'name',
            2 => 'address',
            3 => 'amount',
            4 => 'date', 
            5 => 'created_at'
        );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        if(!empty($dateBegin)&&!empty($dateEnd)){
            $totalData =  Shopping::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Shopping = Shopping::where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Shopping = Shopping::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('address', 'LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }
        }else{
            $totalData =  Shopping::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Shopping = Shopping::where('idUser','=',$idUser)->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Shopping = Shopping::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('address', 'LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Shopping   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Shopping::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Shopping = new Shopping();
        $Shopping->idUser = Auth::user()->id;
        $Shopping->name = $Request->name;
        $Shopping->address = $Request->address;
        $Shopping->amount = $Request->amount;
        $Shopping->date = $Request->date;
        if($Shopping->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Shopping =  Shopping::find((int)$Request->id);
        $Shopping->idUser = Auth::user()->id;
        $Shopping->name = $Request->name;
        $Shopping->address = $Request->address;
        $Shopping->amount = $Request->amount;
        $Shopping->date = $Request->date;
        if($Shopping->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Shopping =  Shopping::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Shopping){
            return JSON1($Shopping);
        }else{
            return JSON1($Shopping);
        }

    }

}