<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Birthday;
use Auth;
class BirthdayController extends Controller
{
    public function getBirthday(Request $Request)
    {
        return view(template().".pages.birthday.index");
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
            $totalData =  Birthday::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Birthday = Birthday::where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Birthday = Birthday::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])
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
            $totalData =  Birthday::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Birthday = Birthday::where('idUser','=',$idUser)->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Birthday = Birthday::where('idUser','=',$idUser)
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
            "data"            => $Birthday   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Birthday::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Birthday = new Birthday();
        $Birthday->idUser = Auth::user()->id;
        $Birthday->name = $Request->name;
        $Birthday->address = $Request->address;
        $Birthday->amount = $Request->amount;
        $Birthday->date = $Request->date;
        if($Birthday->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Birthday =  Birthday::find((int)$Request->id);
        $Birthday->idUser = Auth::user()->id;
        $Birthday->name = $Request->name;
        $Birthday->address = $Request->address;
        $Birthday->amount = $Request->amount;
        $Birthday->date = $Request->date;
        if($Birthday->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Birthday =  Birthday::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Birthday){
            return JSON1($Birthday);
        }else{
            return JSON1($Birthday);
        }

    }

}