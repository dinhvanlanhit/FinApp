<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\GroupMyEvent;
use App\Models\MyEvent;
use App\Models\TypeEvent;
use Auth;
class MyEventController extends Controller
{
    public function getMyEvent(Request $Request)
    {
        $typeevent = TypeEvent::get();
        $groupmyevent = GroupMyEvent::where('idUser','=',Auth::user()->id)->get();
        return view(template().".pages.myevent.index",[
            'typeevent'=>$typeevent,
            'groupmyevent'=>$groupmyevent
        ]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'type_name',
            2 => 'name',
            3 => 'address',
            4 => 'amount',
            5 => 'date', 
            6 => 'created_at'
        );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $idTypeEvent = $Request->input('idTypeEvent');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        if(!empty($idTypeEvent))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  MyEvent::where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $MyEvent = MyEvent::
                    join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('MyEvent.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $MyEvent = MyEvent::
                    join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('MyEvent.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('MyEvent.id', 'LIKE', "%{$search}%")
                        ->orWhere('MyEvent.name', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.address', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.amount','LIKE',"%{$search}%")
                        ->orWhere('MyEvent.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
            }else{
                $totalData =  MyEvent::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $MyEvent = MyEvent::join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)
                    ->select('MyEvent.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $MyEvent = MyEvent::join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)
                    ->select('MyEvent.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('MyEvent.id', 'LIKE', "%{$search}%")
                        ->orWhere('MyEvent.name', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.address', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.amount','LIKE',"%{$search}%")
                        ->orWhere('MyEvent.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  MyEvent::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $MyEvent = MyEvent::
                    join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('MyEvent.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $MyEvent = MyEvent::
                    join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('MyEvent.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('MyEvent.id', 'LIKE', "%{$search}%")
                        ->orWhere('MyEvent.name', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.address', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.amount','LIKE',"%{$search}%")
                        ->orWhere('MyEvent.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
            }else{
                $totalData =  MyEvent::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $MyEvent = MyEvent::join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)
                    ->select('MyEvent.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $MyEvent = MyEvent::join('type_event','type_event.id','=','MyEvent.idTypeEvent')
                    ->where('idUser','=',$idUser)
                    ->select('MyEvent.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('MyEvent.id', 'LIKE', "%{$search}%")
                        ->orWhere('MyEvent.name', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.address', 'LIKE',"%{$search}%")
                        ->orWhere('MyEvent.amount','LIKE',"%{$search}%")
                        ->orWhere('MyEvent.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }
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
        $result = MyEvent::where('idUser','=',Auth::user()->id)->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $MyEvent = new MyEvent();
        $MyEvent->idUser = Auth::user()->id;
        $MyEvent->idWallet = $Request->idWallet;
        $MyEvent->idTypeEvent = $Request->idTypeEvent;
        $MyEvent->name = $Request->name;
        $MyEvent->address = $Request->address;
        $MyEvent->amount = $Request->amount;
        $MyEvent->date = $Request->date;
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
        $MyEvent->idUser = Auth::user()->id;
        $MyEvent->idTypeEvent = $Request->idTypeEvent;
        $MyEvent->idWallet = $Request->idWallet;
        $MyEvent->name = $Request->name;
        $MyEvent->address = $Request->address;
        $MyEvent->amount = $Request->amount;
        $MyEvent->date = $Request->date;
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
        $MyEvent =  MyEvent::where('id','=',(int)$Request->id)->where('idUser','=',Auth::user()->id)->first();
        if($MyEvent){
            return JSON1($MyEvent);
        }else{
            return JSON1($MyEvent);
        }
    }

}