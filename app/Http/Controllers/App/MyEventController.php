<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\GroupMyEvent;
use App\Models\MyEvent;
use App\Models\TypeEvent;
use App\Exports\MyEventExport;
use Auth;
class MyEventController extends Controller
{
    public function getMyEvent(Request $Request)
    {
        $groupmyevent = GroupMyEvent::where('idUser','=',idUser())->get();
        return view(template().".pages.myevent.index",[
            'groupmyevent'=>$groupmyevent
        ]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'group_name',
            2 => 'name',
            3 => 'amount',
            4 => 'address',
            5 => 'date', 
            6 => 'status_name',
            7 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $idGroupMyEvent = $Request->input('idGroupMyEvent');
        $search = $Request->input('search');

        if(!empty($idGroupMyEvent))
        {
     
            $totalData =  MyEvent::where('idUser','=',$idUser)->where('idGroupMyEvent','=',$idGroupMyEvent)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                    $MyEvent = MyEvent::join('group_my_event','group_my_event.id','=','my_event.idGroupMyEvent')
                    ->where('my_event.idUser','=',$idUser)->where('my_event.idGroupMyEvent','=',$idGroupMyEvent)
                    ->select('my_event.*','group_my_event.group_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }else{
                $MyEvent = MyEvent::join('group_my_event','group_my_event.id','=','MyEvent.idGroupMyEvent')
                ->where('my_event.idUser','=',$idUser)->where('my_event.idGroupMyEvent','=',$idGroupMyEvent)
                ->select('my_event.*','group_my_event.group_name')
                ->Where(function($query)use($search){
                    $query->where('my_event.id', 'LIKE', "%{$search}%")
                    ->orWhere('my_event.name', 'LIKE',"%{$search}%")
                    ->orWhere('my_event.status_name', 'LIKE',"%{$search}%")
                    ->orWhere('my_event.address', 'LIKE',"%{$search}%")
                    ->orWhere('my_event.amount','LIKE',"%{$search}%")
                    ->orWhere('my_event.date','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                $totalFiltered =$MyEvent->count();
            }
            
        }else{
           
            $totalData =  MyEvent::where('idUser','=',$idUser)
           
            ->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                    $MyEvent = MyEvent::
                    join('group_my_event','group_my_event.id','=','my_event.idGroupMyEvent')
                    ->where('my_event.idUser','=',$idUser)
                    ->select('my_event.*','group_my_event.group_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }else{
                    $MyEvent = MyEvent::
                    join('group_my_event','group_my_event.id','=','my_event.idGroupMyEvent')
                    ->where('my_event.idUser','=',$idUser)
                    ->select('my_event.*','group_my_event.group_name')
                    ->Where(function($query)use($search){
                        $query->where('my_event.id', 'LIKE', "%{$search}%")
                        ->orWhere('my_event.name', 'LIKE',"%{$search}%")
                        ->orWhere('my_event.status_name', 'LIKE',"%{$search}%")
                        ->orWhere('my_event.address', 'LIKE',"%{$search}%")
                        ->orWhere('my_event.amount','LIKE',"%{$search}%")
                        ->orWhere('my_event.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$MyEvent->count();
            }
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $MyEvent   
        );
        echo json_encode($json_data); 
    }
    public function postDelete(Request $Request)
    {
        $result = MyEvent::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $MyEvent = new MyEvent();
        $MyEvent->idUser = idUser();
        $MyEvent->idWallet = $Request->idWallet;
        $MyEvent->idGroupMyEvent = $Request->idGroupMyEvent;
        $MyEvent->name = $Request->name;
        $MyEvent->address = $Request->address;
        $MyEvent->amount = $Request->amount;
        $MyEvent->date = $Request->date;
        $MyEvent->status = $Request->status;
        $MyEvent->status_name = (int)$Request->status==1?'Còn Nợ':'Hết Nợ';
        $MyEvent->save();
        if($MyEvent){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
    }
    public function postUpdate(Request $Request)
    {
        $MyEvent =  MyEvent::find((int)$Request->id);
        $MyEvent->idUser = idUser();
        $MyEvent->idWallet = $Request->idWallet;
        $MyEvent->idGroupMyEvent = $Request->idGroupMyEvent;
        $MyEvent->name = $Request->name;
        $MyEvent->address = $Request->address;
        $MyEvent->amount = $Request->amount;
        $MyEvent->date = $Request->date;
        $MyEvent->status = $Request->status;
        $MyEvent->status_name = (int)$Request->status==1?'Còn Nợ':'Hết Nợ';
        $MyEvent->save();
        if($MyEvent){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $MyEvent =  MyEvent::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($MyEvent){
            return JSON3($MyEvent,true,'');
        }else{
            return JSON3($MyEvent,false,'');
        }

    }
    public function postExport(Request $Request)
    {
        return MyEventExport::Export($Request);
    }

}