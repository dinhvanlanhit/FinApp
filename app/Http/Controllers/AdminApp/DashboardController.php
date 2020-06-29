<?php

namespace App\Http\Controllers\AdminApp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Auth;
class DashboardController extends Controller
{
    public function Dashboard(Request $Request)
    {
        $data = array(
            'countMemberActive'=>$this->countMemberActive(),
            'countMemberLocked'=>$this->countMemberLocked(),
            'countMemberFree'=>$this->countMemberFree(),
            'countMemberPayfee'=>$this->countMemberPayfee(),
        );
        return view(templateAdminApp().'.pages.dashboard.dashboard',$data);
    }
    public function countMemberActive()
    {
        return Users::where('status','=',0)->where('type','!=','admin')->count();
    }
    public function countMemberLocked()
    {
        return Users::where('status','=',1)->where('type','!=','admin')->count();
    }
    public function countMemberFree()
    {
        return Users::where('status_payment','=',0)->where('type','!=','admin')->count();
    }
    public function countMemberPayfee()
    {
        return Users::where('status_payment','=',1)->where('type','!=','admin')->count();
    }
    
    
    public function getDashboard(Request $Request)
    {
       
    }
    public function getCharDashboard(Request $Request)
    {
       
    }
}