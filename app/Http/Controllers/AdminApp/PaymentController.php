<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use App\Models\UsePayment;
use App\Models\UsersPayment;
use File;
class PaymentController extends Controller
{
    public function getPayMent(Request $Request,int $id=null)
    {
        return view(templateAdminApp().'.pages.payment.payment',
        [
            'usepayments'=>UsePayment::get(),
            'idUser'=>$id
        ]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'name',
            2 => 'amount',
            3 => 'note', 
            4 => 'date',
            5 => 'updated_at',
            6 => 'created_at'
        );
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');

        $idUser = $Request->input('idUser');

       

        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');

        if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  UsersPayment::where('idUser','=',$idUser)
                ->whereBetween('date',[$dateBegin,$dateEnd ])
                ->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Payment = UsersPayment::
                    join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                    ->where('users_payment.idUser','=',$idUser)
                    ->whereBetween('users_payment.date',[$dateBegin,$dateEnd ])
                    ->select('users_payment.*','use_payment.name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Payment = UsersPayment::
                    join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                    ->where('users_payment.idUser','=',$idUser)

                    ->whereBetween('users_payment.date',[$dateBegin,$dateEnd ])
                    ->Where(function($query)use($search){
                        $query->where('users_payment.id', 'LIKE', "%{$search}%")
                        ->orWhere('users_payment.name', 'LIKE',"%{$search}%")
                        ->orWhere('users_payment.payment_methods_name', 'LIKE',"%{$search}%")
                        ->orWhere('users_payment.note', 'LIKE',"%{$search}%")
                        ->orWhere('users_payment.date', 'LIKE',"%{$search}%")
                        ->orWhere('users_payment.created_at', 'LIKE',"%{$search}%")
                        ->orWhere('users_payment.updated_at','LIKE',"%{$search}%");
                    })
                    ->select('users_payment.*','use_payment.name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
        }else{
            $totalData =  UsersPayment::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Payment = UsersPayment::join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                ->where('users_payment.idUser','=',$idUser)
                ->select('users_payment.*','use_payment.name')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Payment = UsersPayment::join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                ->where('users_payment.idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('users_payment.id', 'LIKE', "%{$search}%")
                    ->orWhere('users_payment.name', 'LIKE',"%{$search}%")
                    ->orWhere('users_payment.payment_methods_name', 'LIKE',"%{$search}%")
                    ->orWhere('users_payment.note', 'LIKE',"%{$search}%")
                    ->orWhere('users_payment.date', 'LIKE',"%{$search}%")
                    ->orWhere('users_payment.created_at', 'LIKE',"%{$search}%")
                    ->orWhere('users_payment.updated_at','LIKE',"%{$search}%");
                })
                ->select('users_payment.*','use_payment.name')
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
            "data"            => $Payment   
        );
        echo json_encode($json_data); 
       
    }
    public function postDelete(Request $Request)
    {
        $result =UsersPayment::where('idUser','=',$Request->idUser)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {
        $Payment = new UsersPayment();
        $Payment->idUser =  $Request->idUser;
        $Payment->idUsePayment= $Request->idUsePayment;
        $Payment->numberMonth= $Request->numberMonth;
        $Payment->amount= $Request->amount;
        $Payment->payment_methods = $Request->payment_methods;
        $Payment->payment_methods_name = $Request->payment_methods_name;
        $Payment->note = $Request->note;
        $Payment->date = $Request->date;
        if($Payment->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Payment =  UsersPayment::find((int)$Request->id);
        $Payment->idUser =  $Request->idUser;
        $Payment->idUsePayment= $Request->idUsePayment;
        $Payment->numberMonth= $Request->numberMonth;
        $Payment->amount= $Request->amount;
        $Payment->payment_methods = $Request->payment_methods;
        $Payment->payment_methods_name = $Request->payment_methods_name;
        $Payment->note = $Request->note;
        $Payment->date = $Request->date;
        if($Payment->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Payment =  UsersPayment::where('id','=',(int)$Request->id)->first();
        if($Payment){
            return JSON1($Payment);
        }else{
            return JSON1($Payment);
        }

    }
}