<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
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
            0 => 'created_at',
            1 => 'full_name',
            2 => 'address_1',
            3 => 'status_name',
            4 => 'created_at',
            5 => 'created_at'
        );

        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $status = $Request->input('status');

        if(!empty($status)){
                $totalData =  Users::where('type','=',$type)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Users = Users::
                    where('type','=',$type)
                    ->where('status','=',$status)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Users = Users::
                    where('type','=',$type)
                    ->where('status','=',$status)
                    ->Where(function($query)use($search){
                        $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('full_name', 'LIKE',"%{$search}%")
                        ->orWhere('birthday', 'LIKE',"%{$search}%")
                        ->orWhere('phone_number', 'LIKE',"%{$search}%")
                        ->orWhere('address_1', 'LIKE',"%{$search}%")
                        ->orWhere('status_name', 'LIKE',"%{$search}%")
                        ->orWhere('created_at','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
        }else{
            $totalData =  Users:: where('type','=',$type)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Users = Users::
                where('type','=',$type)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Users = Users::
                    where('type','=',$type)
                   ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                    ->orWhere('birthday', 'LIKE',"%{$search}%")
                    ->orWhere('phone_number', 'LIKE',"%{$search}%")
                    ->orWhere('address_1', 'LIKE',"%{$search}%")
                    ->orWhere('status_name', 'LIKE',"%{$search}%")
                    ->orWhere('created_at','LIKE',"%{$search}%");
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
   
}