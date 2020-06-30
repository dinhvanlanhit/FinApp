<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Roles;
use Auth;
class RolesController extends Controller
{
    public function getRoles(Request $Request)
    {
     
        return view(templateAdminApp().".pages.roles.roles");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'name',
            2 => 'note', 
            3 => 'updated_at', 
            4 => 'created_at'       );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Roles::count();
        $totalFiltered =$totalData;
        if(empty($search)){
            $Roles = Roles::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }else{
            $Roles = Roles::Where(function($query)use($search){
                $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE',"%{$search}%")
                ->orWhere('updated_at', 'LIKE',"%{$search}%")
                ->orWhere('created_at', 'LIKE',"%{$search}%")
                ->orWhere('note','LIKE',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$Roles->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Roles   
        );
        echo json_encode($json_data);
    }
    public function postDelete(Request $Request)
    {
        $result =Roles::where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Roles = new Roles();
        $Roles->name= $Request->name;
        $Roles->note = $Request->note;
        if($Roles->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Roles =  Roles::find((int)$Request->id);
        $Roles->name= $Request->name;
        $Roles->note = $Request->note;
        if($Roles->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Roles =  Roles::where('id','=',(int)$Request->id)->first();
        if($Roles){
            return JSON1($Roles);
        }else{
            return JSON1($Roles);
        }

    }
    public function getPermission(Request $Request,int $id = null)
    {
        $permissions = Roles::where('id','=',$id)->first();
        $permissions =  collect(json_decode($permissions->permission));
        return view(templateAdminApp().".pages.roles.permission",['id'=>$id,'permissions'=>$permissions]);
    }
    public function postPermission(Request $Request)
    {
        $permissions = Roles::find($Request->id);
        $permissions->permission = json_encode($Request->permission);
        if($permissions->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }

}