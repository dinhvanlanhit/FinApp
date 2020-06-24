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
        $columns = array( 
            0 => 'created_at',
            1 => 'full_name',
            2 => 'address_1',
            3 => 'status_name',
            4 => 'created_at'
        );

        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $status = $Request->input('status');

        if(!empty($status)){
                $totalData =  Users::count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Users = Users::where('status','=',$status)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Users = Users::where('status','=',$status)
                    ->Where(function($query)use($search){
                        $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('full_name', 'LIKE',"%{$search}%")
                        ->orWhere('address_1', 'LIKE',"%{$search}%")
                        ->orWhere('created_at','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
        }else{
            $totalData =  Users::count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Users = Users::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Users = Users::Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                    ->orWhere('address_1', 'LIKE',"%{$search}%")
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
}