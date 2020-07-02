<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Salary;
use App\Models\TypeSalary;
use Auth;
class SalaryController extends Controller
{
    public function getSalary(Request $Request)
    {
        $typesalary = TypeSalary::get();
        return view(template().".pages.salary.index",['typesalary'=>$typesalary]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'type_name',
            2 => 'name',
            3 => 'amount',
            4 => 'note',
            5 => 'date', 
            6 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $idTypeSalary = $Request->input('idTypeSalary');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');

        if(!empty($idTypeSalary))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Salary::where('idUser','=',$idUser)->where('idTypeSalary','=',$idTypeSalary)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Salary = Salary::
                    join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)->where('idTypeSalary','=',$idTypeSalary)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('salary.*','type_salary.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Salary = Salary::
                    join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)->where('idTypeSalary','=',$idTypeSalary)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('salary.*','type_salary.type_name')
                    ->Where(function($query)use($search){
                        $query->where('salary.id', 'LIKE', "%{$search}%")
                        ->orWhere('salary.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('salary.amount','LIKE',"%{$search}%")
                        ->orWhere('salary.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Salary->count();
                }
            }else{
                $totalData =  Salary::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)->where('idTypeSalary','=',$idTypeSalary)
                    ->select('salary.*','type_salary.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)->where('idTypeSalary','=',$idTypeSalary)
                    ->select('salary.*','type_salary.type_name')
                    ->Where(function($query)use($search){
                        $query->where('salary.id', 'LIKE', "%{$search}%")
                        ->orWhere('salary.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('salary.amount','LIKE',"%{$search}%")
                        ->orWhere('salary.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Salary->count();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Salary::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Salary = Salary::
                    join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('salary.*','type_salary.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Salary = Salary::
                    join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('salary.*','type_salary.type_name')
                    ->Where(function($query)use($search){
                        $query->where('salary.id', 'LIKE', "%{$search}%")
                        ->orWhere('salary.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('salary.amount','LIKE',"%{$search}%")
                        ->orWhere('salary.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Salary->count();
                }
            }else{
                $totalData =  Salary::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)
                    ->select('salary.*','type_salary.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
                    ->where('idUser','=',$idUser)
                    ->select('salary.*','type_salary.type_name')
                    ->Where(function($query)use($search){
                        $query->where('salary.id', 'LIKE', "%{$search}%")
                        ->orWhere('salary.note', 'LIKE',"%{$search}%")
                        
                        ->orWhere('salary.amount','LIKE',"%{$search}%")
                        ->orWhere('salary.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Salary->count();
                }
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
        $result =Salary::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Salary = new Salary();
        $Salary->idUser = idUser();
        $Salary->idWallet = $Request->idWallet;
        $Salary->idTypeSalary = $Request->idTypeSalary;
        $Salary->amount = $Request->amount;
        $Salary->date = $Request->date;
        $Salary->note = $Request->note;
        $Salary->company = $Request->company;
        if( $Request->name==''||$Request->name==null){
            $Salary->name =Auth::user()->full_name;
        }else{
            $Salary->name=$Request->name;
        }
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
        $Salary->idUser = idUser();
        $Salary->idWallet = $Request->idWallet;
        $Salary->company = $Request->company;
        $Salary->idTypeSalary = $Request->idTypeSalary;
        $Salary->amount = $Request->amount;
        $Salary->date = $Request->date;
        $Salary->note = $Request->note;
        if( $Request->name==''||$Request->name==null){
            $Salary->name =Auth::user()->full_name;
        }else{
            $Salary->name=$Request->name;
        }
        if($Salary->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Salary =  Salary::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Salary){
            return JSON3($Salary,true,'');
        }else{
            return JSON3($Salary,false,'');
        }

    }

}