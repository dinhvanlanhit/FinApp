<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use App\Models\Contact;
class ContactController extends Controller
{
    public function getContact(Request $Request)
    {
       return view(templateAdminApp().'.pages.contact.contact');
    }
    public function getDatatable(Request $Request)
    {
        $columns = array( 
            0 => 'created_at',
            1 => 'full_name',
            2 => 'email',
            3 => 'phone_number',
            4 => 'msg', 
            5 => 'status', 
            6 => 'created_at'
        );
        $idUser = Auth::user()->id;
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $status = $Request->input('status');
        $search = $Request->input('search');
        if(!empty($status)){
            $totalData =  Contact::where('status','=',$status)->count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Contact = Contact::where('status','=',$status)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Contact = Contact::where('status','=',$status)
                ->Where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE',"%{$search}%")
                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                    ->orWhere('email', 'LIKE',"%{$search}%")
                    ->orWhere('phone_number','LIKE',"%{$search}%")
                    ->orWhere('msg','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                $totalFiltered = $Contact->count();
            }
        }else{
            $totalData =  Contact::count();
            $totalFiltered =$totalData;
            if(empty($search)){
                $Contact = Contact::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            }else{
                $Contact = Contact::
                Where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE',"%{$search}%")
                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                    ->orWhere('email', 'LIKE',"%{$search}%")
                    ->orWhere('phone_number','LIKE',"%{$search}%")
                    ->orWhere('msg','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
                $totalFiltered = $Contact->count();
            }
        }
        
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $Contact   
        );
        echo json_encode($json_data); 
    }
}
