<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Installment_purchase;
use App\Models\Installment_purchase_details;
use Auth;
class InstallmentPurchaseController extends Controller
{
    public function getInstallment_purchase(Request $Request)
    {
        return view(template().".pages.installment_purchase.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'name',
            2 => 'prepay',
            3 => 'paid', 
            4 => 'debt', 
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
            $totalData =  Installment_purchase::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Installment_purchase = Installment_purchase::where('idUser','=',$idUser)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Installment_purchase = Installment_purchase::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('number_months','LIKE',"%{$search}%")
                    ->orWhere('month_paid','LIKE',"%{$search}%")
                    ->orWhere('monthly_amount_to_pay','LIKE',"%{$search}%")
                    ->orWhere('prepay','LIKE',"%{$search}%")
                    ->orWhere('paid','LIKE',"%{$search}%")
                    ->orWhere('debt','LIKE',"%{$search}%")
                    ->orWhere('expiration_date','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }
        }else{
            $totalData =  Installment_purchase::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Installment_purchase = Installment_purchase::where('idUser','=',$idUser)->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Installment_purchase = Installment_purchase::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('number_months','LIKE',"%{$search}%")
                    ->orWhere('month_paid','LIKE',"%{$search}%")
                    ->orWhere('monthly_amount_to_pay','LIKE',"%{$search}%")
                    ->orWhere('prepay','LIKE',"%{$search}%")
                    ->orWhere('paid','LIKE',"%{$search}%")
                    ->orWhere('debt','LIKE',"%{$search}%")
                    ->orWhere('expiration_date','LIKE',"%{$search}%")
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
            "data"            => $Installment_purchase   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Installment_purchase::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Installment_purchase = new Installment_purchase();
        $Installment_purchase->idUser = Auth::user()->id;
        $Installment_purchase->name = $Request->name;
        $Installment_purchase->amount = $Request->amount;
        $Installment_purchase->number_months = $Request->number_months;
        $Installment_purchase->monthly_amount_to_pay = $Request->monthly_amount_to_pay;
        $Installment_purchase->prepay = $Request->prepay;
        $Installment_purchase->date = $Request->date;
        $Installment_purchase->expiration_date = $Request->expiration_date;
        if($Installment_purchase->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        // dd($Request->all());
        $Installment_purchase =  Installment_purchase::find((int)$Request->id);
        $Installment_purchase->idUser = Auth::user()->id;
        $Installment_purchase->name = $Request->name;
        $Installment_purchase->amount = $Request->amount;
        $Installment_purchase->number_months = $Request->number_months;
        // $Installment_purchase->month_paid = $Request->month_paid;
        $Installment_purchase->monthly_amount_to_pay = $Request->monthly_amount_to_pay;
        $Installment_purchase->prepay = $Request->prepay;
        $Installment_purchase->date = $Request->date;
        $Installment_purchase->expiration_date = $Request->expiration_date;

        if($Installment_purchase->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Installment_purchase =  Installment_purchase::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($Installment_purchase){
            return JSON1($Installment_purchase);
        }else{
            return JSON1($Installment_purchase);
        }

    }
    public function getPayment(Request $Request)
    {
        $idUser = Auth::user()->id;
        $result = Installment_purchase_details::where('idInstallment_purchase','=',$Request->id)->where('idUser','=',$idUser)->get();
        return json_encode(array('data'=>$result));
    }
    public function postPaymentByID(Request $Request)
    {
        $idUser = Auth::user()->id;
        $result = Installment_purchase_details::where('id','=',$Request->id)->where('idUser','=',$idUser)->first();
        return JSON1($result);
    }
    public function postPaymentUpdate(Request $Request)
    {
        $idInstallment_purchase = (int)$Request->idInstallment_purchase;
        $Data = Installment_purchase_details::find((int)$Request->id);
        $Data->idUser = Auth::user()->id;
        $Data->idInstallment_purchase =$idInstallment_purchase;
        $Data->moth = $Request->moth;
        $Data->payment = $Request->payment;
        $Data->date_payment = $Request->date_payment;
        if($Data->save()){
            $dataUpdate = Installment_purchase::find($idInstallment_purchase);
            $sumPayment = Installment_purchase_details::where('idInstallment_purchase','=',$idInstallment_purchase)->sum('payment');
            $sumMoth = Installment_purchase_details::where('idInstallment_purchase','=',$idInstallment_purchase)->sum('moth');
            $dataUpdate->month_paid = $sumMoth;
            $dataUpdate->paid = $sumPayment;
            $dataUpdate->paid = $sumPayment;
            $dataUpdate->save();
            // dd($sumPayment);
            return JSON2(true,"Cập Nhật thành công");
        }else{
            return JSON2(false,"Cập Nhật không thành công");
        }
    }
    public function postPaymentInsert(Request $Request)
    {
        $Data = new  Installment_purchase_details();
        $Data->idUser = Auth::user()->id;
        $Data->idInstallment_purchase = $Request->idInstallment_purchase;
        $Data->moth = $Request->moth;
        $Data->payment = $Request->payment;
        $Data->date_payment = $Request->date_payment;
        if($Data->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm khống thành công");
        }
    }
    public function postPaymentDelete(Request $Request)
    {
        $result =Installment_purchase_details::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }

}