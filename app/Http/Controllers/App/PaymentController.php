<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use App\Models\UsePayMent;
use App\Models\UsersPayMent;
use File;
class PaymentController extends Controller
{
    public function getPayMent(Request $Request)
    {
        return view(template().'.pages.payment.payment');
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
        $idUser = Auth::user()->id;
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');

        if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  UsersPayMent::where('idUser','=',$idUser)
                ->whereBetween('date',[$dateBegin,$dateEnd ])
                ->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Payment = UsersPayMent::
                    join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                    ->where('users_payment.idUser','=',$idUser)
                    ->whereBetween('users_payment.date',[$dateBegin,$dateEnd ])
                    ->select('users_payment.*','use_payment.name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Payment = UsersPayMent::
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
            $totalData =  UsersPayMent::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Payment = UsersPayMent::join('use_payment','use_payment.id','=','users_payment.idUsePayment')
                ->where('users_payment.idUser','=',$idUser)
                ->select('users_payment.*','use_payment.name')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Payment = UsersPayMent::join('use_payment','use_payment.id','=','users_payment.idUsePayment')
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
}