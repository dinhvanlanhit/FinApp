<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Other_salaries;
use Auth;
class Other_salariesController extends Controller
{
    public function getOther_salaries(Request $Request)
    {
        return view(template().".pages.other_salaries.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'name',
            2 => 'amount',
            3 => 'note',
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
            $totalData =  Other_salaries::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Other_salaries = Other_salaries::where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Other_salaries = Other_salaries::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('address', 'LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('note','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }
        }else{
            $totalData =  Other_salaries::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Other_salaries = Other_salaries::where('idUser','=',$idUser)->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Other_salaries = Other_salaries::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('address', 'LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('note','LIKE',"%{$search}%")
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
            "data"            => $Other_salaries   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Other_salaries::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Other_salaries = new Other_salaries();
        $Other_salaries->idUser = Auth::user()->id;
        $Other_salaries->name = $Request->name;
        $Other_salaries->address = $Request->address;
        $Other_salaries->amount = $Request->amount;
        $Other_salaries->date = $Request->date;
        $Other_salaries->note = $Request->note;
        if($Other_salaries->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Other_salaries =  Other_salaries::find((int)$Request->id);
        $Other_salaries->idUser = Auth::user()->id;
        $Other_salaries->name = $Request->name;
        $Other_salaries->address = $Request->address;
        $Other_salaries->amount = $Request->amount;
        $Other_salaries->date = $Request->date;
        $Other_salaries->note = $Request->note;
        if($Other_salaries->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Other_salaries =  Other_salaries::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Other_salaries){
            return JSON1($Other_salaries);
        }else{
            return JSON1($Other_salaries);
        }

    }

}