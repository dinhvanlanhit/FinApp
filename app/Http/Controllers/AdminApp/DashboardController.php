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
            'countUsersActive'=>$this->getAllMemberActive()
        );
        return view(templateAdminApp().'.pages.dashboard.dashboard',$data);
    }

    public function getAllMemberActive()
    {
        return Users::where('status','=',0)->where('type','!=','admin')->count();
    }

    
    public function getDashboard(Request $Request)
    {
       
    }
    public function getCharDashboard(Request $Request)
    {
       
    }
}