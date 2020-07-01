<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Goals_dreams;
use Auth;
class Goals_dreamsController extends Controller
{
    public function getGoals_dreams(Request $Request)
    {
        return view(template().".pages.goals_dreams.index");
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'name',
            2 => 'note',
            3 => 'dateBegin', 
            4 => 'dateEnd',
            5 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $type = $Request->input('type');
        if(!empty($type)){
                $totalData =  Goals_dreams::where('idUser','=',$idUser)
                ->where('type','=',$type)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Goals_dreams = Goals_dreams::where('idUser','=',$idUser)
                    ->where('type','=',$type)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Goals_dreams = Goals_dreams::where('idUser','=',$idUser)
                    ->where('type','=',$type)
                    ->Where(function($query)use($search){
                        $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('note', 'LIKE',"%{$search}%")
                        ->orWhere('dateBegin', 'LIKE',"%{$search}%")
                        ->orWhere('dateEnd','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                     $totalFiltered =$Goals_dreams->count();
                }
        }else{
            $totalData =  Goals_dreams::where('idUser','=',$idUser)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Goals_dreams = Goals_dreams::where('idUser','=',$idUser)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Goals_dreams = Goals_dreams::where('idUser','=',$idUser)
                ->Where(function($query)use($search){
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('note', 'LIKE',"%{$search}%")
                    ->orWhere('dateBegin', 'LIKE',"%{$search}%")
                    ->orWhere('dateEnd','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                 $totalFiltered =$Goals_dreams->count();
            }
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Goals_dreams   
        );
        echo json_encode($json_data); 
    }
    public function postDelete(Request $Request)
    {
        $result =Goals_dreams::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {

        $Goals_dreams = new Goals_dreams();
        $Goals_dreams->idUser = idUser();
        $Goals_dreams->name= $Request->name;
        $Goals_dreams->note = $Request->note;
        $Goals_dreams->dateBegin = $Request->dateBegin;
        $Goals_dreams->dateEnd = $Request->dateEnd;
        $Goals_dreams->type = $Request->type;
        if($Goals_dreams->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {
        $Goals_dreams =  Goals_dreams::find((int)$Request->id);
        $Goals_dreams->idUser = idUser();
        $Goals_dreams->name= $Request->name;
        $Goals_dreams->note = $Request->note;
        $Goals_dreams->dateBegin = $Request->dateBegin;
        $Goals_dreams->dateEnd = $Request->dateEnd;
        $Goals_dreams->type = $Request->type;
        if($Goals_dreams->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
    }
    public function getUpdate (Request $Request)
    {
        $Goals_dreams =  Goals_dreams::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Goals_dreams){
            return JSON1($Goals_dreams);
        }else{
            return JSON1($Goals_dreams);
        }

    }

}