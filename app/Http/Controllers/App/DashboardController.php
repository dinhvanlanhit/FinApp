<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function Dashboard(Request $Request)
    {
       
        // dd(template());
        return view(template().".pages.dashboard.dashboard");
    }

}