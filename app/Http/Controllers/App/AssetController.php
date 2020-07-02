<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Asset;
use App\Models\TypeAsset;
use Auth;
class AssetController extends Controller
{
    public function getAsset(Request $Request)
    {
        $typeasset = TypeAsset::get();
        return view(template().".pages.asset.index",['typeasset'=>$typeasset]);
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'id',
            1 => 'type_name',
            2 => 'name',
            3 => 'amount',
            4 => 'note', 
            5 => 'created_at'
        );
        $idUser = idUser();
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $idTypeAsset = $Request->input('idTypeAsset');
        $search = $Request->input('search');
        $dateBegin = $Request->input('dateBegin');
        $dateEnd = $Request->input('dateEnd');
        if(!empty($idTypeAsset))
        {
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Asset::where('idUser','=',$idUser)->where('idTypeAsset','=',$idTypeAsset)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Asset = Asset::
                    join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)->where('idTypeAsset','=',$idTypeAsset)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('asset.*','type_asset.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Asset = Asset::
                    join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)->where('idTypeAsset','=',$idTypeAsset)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('asset.*','type_asset.type_name')
                    ->Where(function($query)use($search){
                        $query->where('asset.id', 'LIKE', "%{$search}%")
                        ->orWhere('asset.note', 'LIKE',"%{$search}%")
                        ->orWhere('asset.address','LIKE',"%{$search}%")
                        ->orWhere('asset.amount','LIKE',"%{$search}%")
                        ->orWhere('asset.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                      $totalFiltered =$Asset->count();
                }
            }else{
                $totalData =  Asset::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Asset = Asset::join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)->where('idTypeAsset','=',$idTypeAsset)
                    ->select('asset.*','type_asset.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Asset = Asset::join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)->where('idTypeAsset','=',$idTypeAsset)
                    ->select('asset.*','type_asset.type_name')
                    ->Where(function($query)use($search){
                        $query->where('asset.id', 'LIKE', "%{$search}%")
                        ->orWhere('asset.note', 'LIKE',"%{$search}%")
                        ->orWhere('asset.address','LIKE',"%{$search}%")
                        ->orWhere('asset.amount','LIKE',"%{$search}%")
                        ->orWhere('asset.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                      $totalFiltered =$Asset->count();
                }
            }
        }else{
            if(!empty($dateBegin)&&!empty($dateEnd)){
                $totalData =  Asset::where('idUser','=',$idUser)->whereBetween('date',[$dateBegin,$dateEnd ])->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Asset = Asset::
                    join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('asset.*','type_asset.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Asset = Asset::
                    join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)-> whereBetween('date',[$dateBegin,$dateEnd ])
                    ->select('asset.*','type_asset.type_name')
                    ->Where(function($query)use($search){
                        $query->where('asset.id', 'LIKE', "%{$search}%")
                        ->orWhere('asset.note', 'LIKE',"%{$search}%")
                        ->orWhere('asset.address','LIKE',"%{$search}%")
                        ->orWhere('asset.amount','LIKE',"%{$search}%")
                        ->orWhere('asset.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                      $totalFiltered =$Asset->count();
                }
            }else{
                $totalData =  Asset::where('idUser','=',$idUser)->count();
                $totalFiltered =$totalData;
                if(empty($search)){
                    $Asset = Asset::join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)
                    ->select('asset.*','type_asset.type_name')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                }else{
                    $Asset = Asset::join('type_asset','type_asset.id','=','asset.idTypeAsset')
                    ->where('idUser','=',$idUser)
                    ->select('asset.*','type_asset.type_name')
                    ->Where(function($query)use($search){
                        $query->where('asset.id', 'LIKE', "%{$search}%")
                        ->orWhere('asset.note', 'LIKE',"%{$search}%")
                        ->orWhere('asset.address','LIKE',"%{$search}%")
                        ->orWhere('asset.amount','LIKE',"%{$search}%")
                        ->orWhere('asset.date','LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                      $totalFiltered =$Asset->count();
                }
            }
        }    
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Asset   
        );
        echo json_encode($json_data); 
       
    
    }
    public function postDelete(Request $Request)
    {
        $result =Asset::where('idUser','=',idUser())->where('id','=',$Request->id)->delete();
        if($result){
            return JSON2(true,"");
        }else{
            return JSON2(false,"");
        }
    }
    public function postInsert(Request $Request)
    {
        $Asset = new Asset();
        $Asset->idUser = idUser();
        $Asset->idTypeAsset = $Request->idTypeAsset;
        $Asset->name=$Request->name;
        $Asset->amount = $Request->amount;
        $Asset->note = $Request->note;
        $Asset->address = $Request->address;
        if($Asset->save()){
            return JSON2(true,"Thêm thành công");
        }else{
            return JSON2(false,"Thêm thất bại");
        }
        # code...
    }
    public function postUpdate(Request $Request)
    {

        $Asset =  Asset::find((int)$Request->id);
        $Asset->idUser = idUser();
        $Asset->idTypeAsset = $Request->idTypeAsset;
        $Asset->name=$Request->name;
        $Asset->amount = $Request->amount;
        $Asset->note = $Request->note;
        $Asset->address = $Request->address;
        if($Asset->save()){
            return JSON2(true,"Cập nhật thành công");
        }else{
            return JSON2(false,"Cập nhật thất bại");
        }
        # code...
    }
    public function getUpdate (Request $Request)
    {
        $Asset =  Asset::where('id','=',(int)$Request->id)->where('idUser','=',idUser())->first();
        if($Asset){
            return JSON3($Asset,true,'');
        }else{
            return JSON3($Asset,false,'');
        }

    }

}