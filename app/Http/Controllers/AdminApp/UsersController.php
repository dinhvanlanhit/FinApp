<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
class UsersController extends Controller
{
    public function getIndex(Request $Request)
    {
         return view(templateAdminApp().'.pages.users.index');
    }
}