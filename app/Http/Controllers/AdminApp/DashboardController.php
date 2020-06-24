<?php

namespace App\Http\Controllers\AdminApp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
class DashboardController extends Controller
{
    public function Dashboard(Request $Request)
    {

        return view(templateAdminApp().'.pages.dashboard.dashboard');
    }

    public function getDashboard(Request $Request)
    {
       
    }
    public function getCharDashboard(Request $Request)
    {
       
    }
}