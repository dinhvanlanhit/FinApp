<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Debt;
use App\Models\TypeDebt;
use Auth;
class DebtController extends Controller
{
    public function getDebt(Request $Request)
    {
        $typedebt = TypeDebt::get();
        return view(template().".pages.debt.index",['typedebt'=>$typedebt]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'type_name',
            2 => 'amount',
            3 => 'amount', 
            4 => 'date', 
            5 => 'created_at'
        );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');

        $idTypeDebt = $Request->input('idTypeDebt');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');

        if(!empty($idTypeDebt))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Debt::where('idUser','=',$idUser)->where('idTypeDebt','=',$idTypeDebt)->whereBetween('debt.date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Debt = Debt::
                    join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('idUser','=',$idUser)->where('idTypeDebt','=',$idTypeDebt)-> whereBetween('debt.date',[$dateBegin,$dateEnd ])
                    ->select('debt.*','type_debt.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Debt = Debt::
                    join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('idUser','=',$idUser)->where('idTypeDebt','=',$idTypeDebt)-> whereBetween('debt.date',[$dateBegin,$dateEnd ])
                    ->select('debt.*','type_debt.type_name')
                    ->Where(function($query)use($search){
                        $query->where('debt.id', 'LIKE', "%{$search}%")
                        ->orWhere('debt.note', 'LIKE',"%{$search}%")
                        ->orWhere('debt.name', 'LIKE',"%{$search}%")
                        ->orWhere('debt.amount','LIKE',"%{$search}%")
                        ->orWhere('debt.status', 'LIKE',"%{$search}%")
                        ->orWhere('debt.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Debt->count();
                }
            }else{
                $totalData =  Debt::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Debt = Debt::join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('idUser','=',$idUser)->where('idTypeDebt','=',$idTypeDebt)
                    ->select('debt.*','type_debt.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Debt = Debt::join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('idUser','=',$idUser)->where('idTypeDebt','=',$idTypeDebt)
                    ->select('debt.*','type_debt.type_name')
                    ->Where(function($query)use($search){
                        $query->where('debt.id', 'LIKE', "%{$search}%")
                        ->orWhere('debt.note', 'LIKE',"%{$search}%")
                        ->orWhere('debt.name', 'LIKE',"%{$search}%")
                        ->orWhere('debt.amount','LIKE',"%{$search}%")
                        ->orWhere('debt.status', 'LIKE',"%{$search}%")
                        ->orWhere('debt.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Debt->count();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Debt::where('idUser','=',$idUser)->whereBetween('debt.date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Debt = Debt::
                    join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('idUser','=',$idUser)-> whereBetween('debt.date',[$dateBegin,$dateEnd ])
                    ->select('debt.*','type_debt.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Debt = Debt::
                    join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('debt.idUser','=',$idUser)-> whereBetween('debt.date',[$dateBegin,$dateEnd ])
                    ->select('debt.*','type_debt.type_name')
                    ->Where(function($query)use($search){
                        $query->where('debt.id', 'LIKE', "%{$search}%")
                        ->orWhere('debt.note', 'LIKE',"%{$search}%")
                        ->orWhere('debt.status', 'LIKE',"%{$search}%")
                        ->orWhere('debt.name', 'LIKE',"%{$search}%")
                        ->orWhere('debt.amount','LIKE',"%{$search}%")
                        ->orWhere('debt.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Debt->count();
                }
            }else{
                $totalData =  Debt::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Debt = Debt::join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('debt.idUser','=',$idUser)
                    ->select('debt.*','type_debt.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Debt = Debt::join('type_debt','type_debt.id','=','debt.idTypeDebt')
                    ->where('debt.idUser','=',$idUser)
                    ->select('debt.*','type_debt.type_name')
                    ->Where(function($query)use($search){
                        $query->where('debt.id', 'LIKE', "%{$search}%")
                        ->orWhere('debt.name', 'LIKE',"%{$search}%")
                        ->orWhere('debt.status', 'LIKE',"%{$search}%")
                        ->orWhere('debt.note', 'LIKE',"%{$search}%")
                        ->orWhere('debt.amount','LIKE',"%{$search}%")
                        ->orWhere('debt.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Debt->count();
                }
            }
        }
            
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Debt   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Debt::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Debt = new Debt();
        $Debt->idUser = Auth::user()->id;
        $Debt->idTypeDebt = $Request->idTypeDebt;
        $Debt->idWallet = $Request->idWallet;
        $Debt->name= $Request->name;
        $Debt->amount= $Request->amount;
        $Debt->tenor= $Request->tenor;
        $Debt->interest_rate = ($Request->interest_rate == 'NaN'?0:$Request->interest_rate);
        $Debt->date = $Request->date;
        $Debt->expiration_date = $Request->expiration_date;
        $Debt->note = $Request->note;
        $Debt->status = $Request->status;
        if($Debt->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Debt =  Debt::find((int)$Request->id);
        $Debt->idUser = Auth::user()->id;
        $Debt->idWallet = $Request->idWallet;
        $Debt->idTypeDebt = $Request->idTypeDebt;
        $Debt->name= $Request->name;
        $Debt->amount= $Request->amount;
        $Debt->tenor= $Request->tenor;
        $Debt->interest_rate = ($Request->interest_rate == 'NaN'?0:$Request->interest_rate);
        $Debt->date = $Request->date;
        $Debt->expiration_date = $Request->expiration_date;
        $Debt->note = $Request->note;
        $Debt->status = $Request->status;
        if($Debt->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Debt =  Debt::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Debt){
            return JSON1($Debt);
        }else{
            return JSON1($Debt);
        }

    }

}