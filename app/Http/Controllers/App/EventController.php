<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
use App\Models\TypeEvent;
use Auth;
class EventController extends Controller
{
    public function getEvent(Request $Request)
    {
        $typeevent = TypeEvent::get();
        return view(template().".pages.event.index",['typeevent'=>$typeevent]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'type_name',
            2 => 'name',
            3 => 'address',
            4 => 'amount',
            5 => 'note',
            6 => 'date', 
            7 => 'created_at'
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

        if(!empty($idTypeEvent))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Event::where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Event = Event::
                    join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('event.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Event = Event::
                    join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('event.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('event.id', 'LIKE', "%{$search}%")
                        ->orWhere('event.name', 'LIKE',"%{$search}%")
                        ->orWhere('event.address', 'LIKE',"%{$search}%")
                        ->orWhere('event.amount','LIKE',"%{$search}%")
                        ->orWhere('event.note','LIKE',"%{$search}%")
                        ->orWhere('event.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Event->count();
                }
            }else{
                $totalData =  Event::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Event = Event::join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)
                    ->select('event.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Event = Event::join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)->where('idTypeEvent','=',$idTypeEvent)
                    ->select('event.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('event.id', 'LIKE', "%{$search}%")
                        ->orWhere('event.name', 'LIKE',"%{$search}%")
                        ->orWhere('event.address', 'LIKE',"%{$search}%")
                        ->orWhere('event.amount','LIKE',"%{$search}%")
                        ->orWhere('event.note','LIKE',"%{$search}%")
                        ->orWhere('event.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Event->count();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Event::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Event = Event::
                    join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('event.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Event = Event::
                    join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('event.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('event.id', 'LIKE', "%{$search}%")
                        ->orWhere('event.name', 'LIKE',"%{$search}%")
                        ->orWhere('event.address', 'LIKE',"%{$search}%")
                        ->orWhere('event.amount','LIKE',"%{$search}%")
                        ->orWhere('event.note','LIKE',"%{$search}%")
                        ->orWhere('event.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Event->count();
                }
            }else{
                $totalData =  Event::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Event = Event::join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)
                    ->select('event.*','type_event.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Event = Event::join('type_event','type_event.id','=','event.idTypeEvent')
                    ->where('idUser','=',$idUser)
                    ->select('event.*','type_event.type_name')
                    ->Where(function($query)use($search){
                        $query->where('event.id', 'LIKE', "%{$search}%")
                        ->orWhere('event.name', 'LIKE',"%{$search}%")
                        ->orWhere('event.address', 'LIKE',"%{$search}%")
                        ->orWhere('event.amount','LIKE',"%{$search}%")
                        ->orWhere('event.note','LIKE',"%{$search}%")
                        ->orWhere('event.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                    $totalFiltered =$Event->count();
                }
            }
        }
            
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Event   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Event::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Event = new Event();
        $Event->idUser = idUser();
        $Event->idTypeEvent = $Request->idTypeEvent;
        $Event->name = $Request->name;
        $Event->address = $Request->address;
        $Event->amount = $Request->amount;
        $Event->date = $Request->date;
        $Event->note = $Request->note;
        $Event->save();
        if($Event){
           
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
    }
    public function postUpdate(Request $Request)
    {
        $Event =  Event::find((int)$Request->id);
        $Event->idUser = idUser();
        $Event->idTypeEvent = $Request->idTypeEvent;
        $Event->name = $Request->name;
        $Event->address = $Request->address;
        $Event->amount = $Request->amount;
        $Event->date = $Request->date;
        $Event->note = $Request->note;
        $Event->save();
        if($Event){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Event =  Event::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Event){
            return JSON3($Event,true,'');
        }else{
            return JSON3($Event,false,'');
        }

    }

}