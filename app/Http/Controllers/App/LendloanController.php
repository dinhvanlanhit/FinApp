<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Lendloan;

use Auth;
class LendloanController extends Controller
{
    public function getLendloan(Request $Request)
    {
     
        return view(template().".pages.lendloan.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'name',
            2 => 'loan',
            3 => 'loan', 
            3 => 'date', 
            4 => 'created_at'
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
                $totalData =  Lendloan::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Lendloan = Lendloan::where('idUser','=',$idUser)
                    ->whereBetween('date',[$dateBegin,$dateEnd ])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Lendloan = Lendloan::where('idUser','=',$idUser)
                    -> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->Where(function($query)use($search){
                        $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('note', 'LIKE',"%{$search}%")
                        ->orWhere('amount','LIKE',"%{$search}%")
                        ->orWhere('date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
        }else{
            $totalData =  Lendloan::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Lendloan = Lendloan::where('idUser','=',$idUser)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Lendloan = Lendloan::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('note', 'LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
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
            "data"            => $Lendloan   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Lendloan::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Lendloan = new Lendloan();
        $Lendloan->idUser = Auth::user()->id;
       
        $Lendloan->name= $Request->name;
        $Lendloan->loan= $Request->loan;
        $Lendloan->tenor= $Request->tenor;
        $Lendloan->interest_rate = $Request->interest_rate;
        $Lendloan->date = $Request->date;
        $Lendloan->expiration_date = $Request->expiration_date;
        $Lendloan->note = $Request->note;

        if($Lendloan->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Lendloan =  Lendloan::find((int)$Request->id);
        $Lendloan->idUser = Auth::user()->id;
       
        $Lendloan->name= $Request->name;
        $Lendloan->loan= $Request->loan;
        $Lendloan->tenor= $Request->tenor;
        $Lendloan->interest_rate = $Request->interest_rate;
        $Lendloan->date = $Request->date;
        $Lendloan->expiration_date = $Request->expiration_date;
        $Lendloan->note = $Request->note;
        if($Lendloan->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Lendloan =  Lendloan::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Lendloan){
            return JSON1($Lendloan);
        }else{
            return JSON1($Lendloan);
        }

    }

}