<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Salary;
use Auth;
class SalaryController extends Controller
{
    public function getSalary(Request $Request)
    {
        return view(template().".pages.salary.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'company',
            2 => 'amount',
            3 => 'info',
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
            $totalData =  Salary::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Salary = Salary::where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Salary = Salary::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE',"%{$search}%")
                    ->orWhere('name','LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('info','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }
        }else{
            $totalData =  Salary::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Salary = Salary::where('idUser','=',$idUser)->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Salary = Salary::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE',"%{$search}%")
                    ->orWhere('name','LIKE',"%{$search}%")
                    ->orWhere('amount','LIKE',"%{$search}%")
                    ->orWhere('info','LIKE',"%{$search}%")
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
            "data"            => $Salary   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Salary::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Salary = new Salary();
        $Salary->idUser = Auth::user()->id;
        $Salary->name = $Request->name;
        $Salary->company = $Request->company;
        $Salary->amount = $Request->amount;
        $Salary->date = $Request->date;
        $Salary->info = $Request->info;
        if($Salary->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Salary =  Salary::find((int)$Request->id);
        $Salary->idUser = Auth::user()->id;
        $Salary->name = $Request->name;
        $Salary->company = $Request->company;
        $Salary->amount = $Request->amount;
        $Salary->date = $Request->date;
        $Salary->info = $Request->info;
        if($Salary->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Salary =  Salary::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Salary){
            return JSON1($Salary);
        }else{
            return JSON1($Salary);
        }

    }

}