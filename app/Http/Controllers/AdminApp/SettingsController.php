<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Settings;
use File;
use DB;
class SettingsController extends Controller
{
    public function getSetting(Request $Request)
    {
         return view(templateAdminApp().'.pages.settings.settings',['data'=>Settings::find(1)]);
    }

}