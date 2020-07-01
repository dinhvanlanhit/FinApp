<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\GroupMyEvent;
use App\Models\MyEvent;
use Auth;
class GroupMyEventController extends Controller
{
    public function getGroupMyEvent(Request $Request)
    {
        return view(template().".pages.groupmyevent.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'group_name',
            2 => 'note',
            3 => 'date',
            4 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $idTypeEvent = $Request->input('idTypeEvent');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        if(!empty($dateBegin)&&!empty($dateEnd)){
            $totalData =  GroupMyEvent::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $GroupMyEvent = GroupMyEvent::where('idUser','=',$idUser)
                ->whereBetween('date',[$dateBegin,$dateEnd ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $GroupMyEvent = GroupMyEvent::where('idUser','=',$idUser)
                ->whereBetween('date',[$dateBegin,$dateEnd ])
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('group_name', 'LIKE',"%{$search}%")
                    ->orWhere('note','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                 $totalFiltered =$GroupMyEvent->count();
            }
        }else{
            $totalData =  GroupMyEvent::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $GroupMyEvent = GroupMyEvent::where('idUser','=',$idUser)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $GroupMyEvent = GroupMyEvent::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('group_name', 'LIKE',"%{$search}%")
                    ->orWhere('note','LIKE',"%{$search}%")
                    ->orWhere('date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                 $totalFiltered =$GroupMyEvent->count();
            }
        }  
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $GroupMyEvent   
        );
        echo json_encode($json_data); 
    }
    public function postDelete(Request $Request)
    {
        $result =GroupMyEvent::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $GroupMyEvent = new GroupMyEvent();
        $GroupMyEvent->idUser = idUser();
        $GroupMyEvent->group_name = $Request->group_name;
        $GroupMyEvent->note = $Request->note;
        $GroupMyEvent->date = $Request->date;
        $GroupMyEvent->save();
        if($GroupMyEvent){
           
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
    }
    public function postUpdate(Request $Request)
    {
        $GroupMyEvent =  GroupMyEvent::find((int)$Request->id);
        $GroupMyEvent->group_name = $Request->group_name;
        $GroupMyEvent->note = $Request->note;
        $GroupMyEvent->date = $Request->date;
        $GroupMyEvent->save();
        if($GroupMyEvent){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $GroupMyEvent =  GroupMyEvent::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($GroupMyEvent){
           
            return JSON1($GroupMyEvent);
        }else{
            return JSON1($GroupMyEvent);
        }

    }

}