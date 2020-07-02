<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Auth;
use Mail;
class MembershipController extends Controller
{
    public function getMembership(Request $Request)
    {
        return view(template().".pages.membership.membership");
    }
    public function getDatatable (Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'full_name',
            2 => 'username',
            3 => 'note', 
            4 => 'updated_at',
            5 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        $totalData =  Users::where('parent_id','=',$idUser)->count();
        $totalFiltered =$totalData;
        if(empty($search)){
            $Users = Users::where('parent_id','=',$idUser)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }else{
            $Users = Users::where('parent_id','=',$idUser)
            ->Where(function($query)use($search){
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                    ->orWhere('username', 'LIKE',"%{$search}%")
                    ->orWhere('note', 'LIKE',"%{$search}%")
                    ->orWhere('created_at', 'LIKE',"%{$search}%")
                    ->orWhere('updated_at','LIKE',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$Users->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Users   
        );
        echo json_encode($json_data); 
    }
    public function postInsert(Request $Request)
    {

        $Users = new Users();
        $Users->parent_id = idUser();
        $Users->full_name= $Request->full_name;
        $Users->username= $Request->username;
        $Users->type= 'membership';
        if($Request->password==''){
            $Users->password = bcrypt('12345');
        }else{
            $Users->password = bcrypt($Request->password);
        }
        $Users->note = $Request->note;
        if($Users->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Users =  Users::find((int)$Request->id);
        $Users->parent_id = idUser();
        $Users->full_name= $Request->full_name;
        $Users->type= 'membership';
        $Users->username= $Request->username;
        if($Request->password!=''){
            $Users->password = bcrypt($Request->password);
        }
        $Users->note = $Request->note;
        if($Users->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Users =  Users::where('id','=',(int)$Request->id)->where('parent_id','=',idUser())->first();
        if($Users){
            return JSON1($Users);
        }else{
            return JSON1($Users);
        }

    }
}