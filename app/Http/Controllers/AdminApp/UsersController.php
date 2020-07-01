<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
use DB;
class UsersController extends Controller
{
    public function getIndex(Request $Request)
    {
         return view(templateAdminApp().'.pages.users.index');
    }
    public function getDatatable(Request $Request)
    {
    
        $type = 'member';
        $columns = array( 
            0 => 'full_name',
            1 => 'status_name',
            2 => 'created_at',
           
        );
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $status = $Request->input('status');
        $SQL = "SELECT * FROM users AS users_PARENT LEFT JOIN ";
        $SQL .="( SELECT SUM(numberMonth) AS sumMonth , idUser  ";
        $SQL .=" FROM users_payment ";
        $SQL .=" GROUP BY idUser    ";
        $SQL .=") AS child ON ";
        $SQL .= " child.idUser = users_PARENT.id ";
        $SQL .= " WHERE type = '{$type}' ";
        if(!empty($status)){
            $SQL .= " AND status = '{$status}' ";
            $totalData = count(DB::select(DB::raw($SQL)));
            $totalFiltered = $totalData;
            if(!empty($search)){
                $SQL .= " AND (";
                $SQL .= " full_name LIKE N'%$search%'";
                $SQL .= " OR email LIKE N'%$search%'";
                $SQL .= " OR phone_number LIKE N'%$search%'";
                $SQL .= " OR date LIKE N'%$search%'";
                $SQL .= " OR address_1 LIKE N'%$search%'";
                $SQL .= " OR status_name LIKE N'%$search%'";
                $SQL .= " OR status_payment_name LIKE N'%$search%'";
                $SQL .= " OR created_at LIKE N'%$search%' )";
                $SQL .= " ORDER BY {$order} {$dir}";
                $SQL .= " LIMIT {$limit} OFFSET {$start}";
                $Users  =  DB::select(DB::raw($SQL)); 
            }else{
                $SQL .= " ORDER BY {$order} {$dir}";
                $SQL .= " LIMIT {$limit} OFFSET {$start}";
                $Users  =  DB::select(DB::raw($SQL)); 
            }
        }else{
            $totalData = count(DB::select(DB::raw($SQL)));
            $totalFiltered = $totalData;
            if(!empty($search)){
                $SQL .= " AND (";
                $SQL .= " full_name LIKE N'%$search%'";
                $SQL .= " OR email LIKE N'%$search%'";
                $SQL .= " OR phone_number LIKE N'%$search%'";
                $SQL .= " OR date LIKE N'%$search%'";
                $SQL .= " OR address_1 LIKE N'%$search%'";
                $SQL .= " OR status_name LIKE N'%$search%'";
                $SQL .= " OR status_payment_name LIKE N'%$search%'";
                $SQL .= " OR created_at LIKE N'%$search%' )";
                $SQL .= " ORDER BY {$order} {$dir}";
                $SQL .= " LIMIT {$limit} OFFSET {$start}";
                $Users  =  DB::select(DB::raw($SQL)); 
            }else{
                $SQL .= " ORDER BY {$order} {$dir}";
                $SQL .= " LIMIT {$limit} OFFSET {$start}";
                $Users  =  DB::select(DB::raw($SQL)); 
            }
           
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Users   
        );
        echo json_encode($json_data); 
    }

    public function getUpdate(Request $Request,int $id =null)
    {
        $users = Users::where('id','=',$id)->get();
        if($users){
            return view(templateAdminApp().'.pages.users.action',['action'=>'update','users'=> Users::find($id)]);
        }
    }
    public function getInsert(Request $Request)
    {
        return view(templateAdminApp().'.pages.users.action',['action'=>'insert','users'=>new Users()]);
    }
    public function postUpdate(Request $Request)
    {
        $isCheckEmail = Users::where('email','=',$Request->email)->where('id','!=',$Request->id)->first();
        if($isCheckEmail){
                return JSON2(false,' : Email đã tồn tại vui lòng nhập Email khác !!');
        }else{
            $Users =  Users::find((int)$Request->id);
            $Users->user_type =(int) $Request->user_type;
            $Users->email = $Request->email;
            $Users->full_name =$Request->full_name;
            $Users->sex = $Request->sex;
            $Users->status = (int)$Request->status;
            $Users->status_name = (int)$Request->status==1?'Khóa':'Mở';
            $Users->status_payment = (int)$Request->status_payment;
            $Users->status_payment_name = (int)$Request->status_payment==1?'Trả Phí':'Miễn Phí';
            if($Request->password!=''){
                $Users->password =bcrypt($Request->password);
            }
            $Users->introduce =$Request->introduce;
            $Users->birthday =$Request->birthday;
            $Users->address_1 =$Request->address_1;
            $Users->phone_number =$Request->phone_number;
            $Users->date =$Request->date;
            
            if( $Users->save()){
                    return JSON2(true,'Cập nhật thông tin thành công !!');
            }else{ 
                    return JSON2(false,'Cập nhật thông tin không thành công !!');
            }
        }
    }
    public function postInsert(Request $Request)
    {
        $isCheckEmail = Users::where('email','=',$Request->email)->first();
        if($isCheckEmail){
                return JSON2(false,'Email đã tồn tại vui lòng nhập Email khác !!');
        }else{
            $Users = new  Users();
            $Users->user_type =(int) $Request->user_type;
            $Users->email = $Request->email;
            $Users->full_name =$Request->full_name;
            $Users->sex = $Request->sex;
            $Users->status = (int)$Request->status;
            $Users->status_name = (int)$Request->status==1?'Khóa':'Mở';
            $Users->status_payment = (int)$Request->status_payment;
            $Users->status_payment_name = (int)$Request->status_payment==1?'Trả Phí':'Miễn Phí';

            if($Request->password!=''){
                $Users->password =bcrypt($Request->password);
            }
            $Users->introduce =$Request->introduce;
            $Users->birthday =$Request->birthday;
            $Users->address_1 =$Request->address_1;
            $Users->phone_number =$Request->phone_number;
            $Users->date =$Request->date;
            if( $Users->save()){
                    return JSON2(true,'Thêm thành công !!');
            }else{ 
                    return JSON2(false,'Thêm không thành công !!');
            }
        }
    }
    public function postDelete(Request $Request)
    {
        $rs = Users::where('id','=',$Request->id)->first();
        if($rs){
            $Users = Users::find((int)$Request->id);
            if($Users->delete()){
                return JSON2(true,'Xóa Thành Công');
            }else{
                return JSON2(true,'Xóa Không Thành Công');
            }
        }
    }
    public function viewUsers(Request $Request,int $id = null)
    {
        Session::put('view_users', $id);
        // dd(Session::get('view_users'));
        return redirect()->route('dashboard');
    }
   
}