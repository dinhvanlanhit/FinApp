<?php

// namespace App\Http\Controllers\App;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
// use App\Models\Debt;
// use Auth;
// class DebtController extends Controller
// {
//     public function getDebt(Request $Request)
//     {
//         return view(template().".pages.debt.index");
//     }
//     public function getDatatable(Request $Request)
//     {
//         $columns = array( 
//             0 => 'id',
//             1 => 'name',
//             2 => 'prepay',
//             3 => 'paid', 
//             4 => 'debt', 
//             5 => 'created_at'
//         );
//         $idUser = Auth::user()->id;
//         $limit = $Request->input('length');
//         $start = $Request->input('start');
//         $order = $columns[$Request->input('order.0.column')];
//         $dir = $Request->input('order.0.dir');
//         $search = $Request->input('search');
//         $dateBegin = $Request->input('dateBegin');
//         $dateEnd = $Request->input('dateEnd');
//         if(!empty($dateBegin)&&!empty($dateEnd)){
//             $totalData =  Debt::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
//             $totalFiltered =$totalData;
//             if(empty($search)){
//                 $Debt = Debt::where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
//                 ->offset($start)
//                 ->limit($limit)
//                 ->orderBy($order,$dir)
//                 ->get();
//             }else{
//                 $Debt = Debt::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])
//                 ->Where(function($query)use($search){
//                     $query->where('id', 'LIKE', "%{$search}%")
//                     ->orWhere('name', 'LIKE',"%{$search}%")
//                     ->orWhere('amount', 'LIKE',"%{$search}%")
//                     ->orWhere('number_months','LIKE',"%{$search}%")
//                     ->orWhere('remaining_month','LIKE',"%{$search}%")
//                     ->orWhere('monthly_amount_to_pay','LIKE',"%{$search}%")
//                     ->orWhere('prepay','LIKE',"%{$search}%")
//                     ->orWhere('paid','LIKE',"%{$search}%")
//                     ->orWhere('debt','LIKE',"%{$search}%")
//                     ->orWhere('expiration_date','LIKE',"%{$search}%")
//                     ->orWhere('date','LIKE',"%{$search}%");
//                 })
//                 ->offset($start)
//                 ->limit($limit)
//                 ->orderBy($order,$dir)
//                 ->get();
//             }
//         }else{
//             $totalData =  Debt::where('idUser','=',$idUser)->count();
//             $totalFiltered =$totalData;
//             if(empty($search)){
//                 $Debt = Debt::where('idUser','=',$idUser)->offset($start)
//                 ->limit($limit)
//                 ->orderBy($order,$dir)
//                 ->get();
//             }else{
//                 $Debt = Debt::where('idUser','=',$idUser)
//                 ->Where(function($query)use($search){
//                     $query->where('id', 'LIKE', "%{$search}%")
//                     ->orWhere('name', 'LIKE',"%{$search}%")
//                     ->orWhere('amount', 'LIKE',"%{$search}%")
//                     ->orWhere('number_months','LIKE',"%{$search}%")
//                     ->orWhere('remaining_month','LIKE',"%{$search}%")
//                     ->orWhere('monthly_amount_to_pay','LIKE',"%{$search}%")
//                     ->orWhere('prepay','LIKE',"%{$search}%")
//                     ->orWhere('paid','LIKE',"%{$search}%")
//                     ->orWhere('debt','LIKE',"%{$search}%")
//                     ->orWhere('expiration_date','LIKE',"%{$search}%")
//                     ->orWhere('date','LIKE',"%{$search}%");
//                 })
//                 ->offset($start)
//                 ->limit($limit)
//                 ->orderBy($order,$dir)
//                 ->get();
//             }
//         }
//         $json_data = array(
//             "draw"            => intval($Request->input('draw')),  
//             "recordsTotal"    => intval($totalData),  
//             "recordsFiltered" => intval($totalFiltered), 
//             "data"            => $Debt   
//         );
//         echo json_encode($json_data); 
       
    
//     }
//     public function postDelete(Request $Request)
//     {
//         $result =Debt::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
//         if($result){
//             return JSON2(true,"");
//         }else{
//             return JSON2(false,"");
//         }
//     }
//     public function postInsert(Request $Request)
//     {

//         $Debt = new Debt();
//         $Debt->idUser = Auth::user()->id;
//         $Debt->name = $Request->name;
//         $Debt->amount = $Request->amount;
//         $Debt->number_months = $Request->number_months;
//         $Debt->remaining_month = $Request->remaining_month;
//         $Debt->monthly_amount_to_pay = $Request->monthly_amount_to_pay;
//         $Debt->prepay = $Request->prepay;
//         // $Debt->paid = $Request->paid;
//         // $Debt->debt = $Request->debt;
//         $Debt->date = $Request->date;
//         $Debt->expiration_date = $Request->expiration_date;
//         if($Debt->save()){
//             return JSON2(true,"Thêm thành công");
//         }else{
//             return JSON2(false,"Thêm thất bại");
//         }
//         # code...
//     }
//     public function postUpdate(Request $Request)
//     {
//         // dd($Request->all());
//         $Debt =  Debt::find((int)$Request->id);
//         $Debt->idUser = Auth::user()->id;
//         $Debt->name = $Request->name;
//         $Debt->amount = $Request->amount;
//         $Debt->number_months = $Request->number_months;
//         $Debt->remaining_month = $Request->remaining_month;
//         $Debt->monthly_amount_to_pay = $Request->monthly_amount_to_pay;
//         $Debt->prepay = $Request->prepay;
//         // $Debt->paid = $Request->paid;
//         // $Debt->debt = $Request->debt;
//         $Debt->date = $Request->date;
//         $Debt->expiration_date = $Request->expiration_date;

//         if($Debt->save()){
//             return JSON2(true,"Cập nhật thành công");
//         }else{
//             return JSON2(false,"Cập nhật thất bại");
//         }
//         # code...
//     }
//     public function getUpdate (Request $Request)
//     {
//         $Debt =  Debt::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
//         if($Debt){
//             return JSON1($Debt);
//         }else{
//             return JSON1($Debt);
//         }

//     }
//     public function getPayment(Request $Request)
//     {
//         $idUser = Auth::user()->id;
//         $result = Debt::where('idDebt','=',$Request->id)->where('idUser','=',$idUser)->get();
//         return json_encode(array('data'=>$result));
//     }
//     public function postPaymentByID(Request $Request)
//     {
//         $idUser = Auth::user()->id;
//         $result = Debt::where('id','=',$Request->id)->where('idUser','=',$idUser)->first();
//         return JSON1($result);
//     }
//     public function postPaymentUpdate(Request $Request)
//     {
//         $Data = Debt::find((int)$Request->id);
//         $Data->idUser = Auth::user()->id;
//         $Data->idDebt = $Request->idDebt;
//         $Data->payment = $Request->payment;
//         $Data->date_payment = $Request->date_payment;
//         if($Data->save()){
//             return JSON2(true,"Cập Nhật thành công");
//         }else{
//             return JSON2(false,"Cập Nhật không thành công");
//         }
//     }
//     public function postPaymentInsert(Request $Request)
//     {
//         $Data = new  Debt();
//         $Data->idUser = Auth::user()->id;
//         $Data->idDebt = $Request->idDebt;
//         $Data->payment = $Request->payment;
//         $Data->date_payment = $Request->date_payment;
//         if($Data->save()){
//             return JSON2(true,"Thêm thành công");
//         }else{
//             return JSON2(false,"Thêm khống thành công");
//         }
//     }
//     public function postPaymentDelete(Request $Request)
//     {
//         $result =Debt::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
//         if($result){
//             return JSON2(true,"");
//         }else{
//             return JSON2(false,"");
//         }
//     }

// }