<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
use DB;
class ErrorController  extends Controller
{
    public function get404(Request $Request)
    {
         return view(template().'.pages.error.404');
    }
    public function get505(Request $Request)
    {
         return view(template().'.pages.error.505');
    }
}