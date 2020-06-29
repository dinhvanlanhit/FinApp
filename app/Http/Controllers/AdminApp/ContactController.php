<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Route;
use DB;
use Auth;
use App\Models\Users;
use App\Models\Companies;
class ContactController extends Controller
{
    public function getContact(Request $Request)
    {
       return view(templateAdminApp().'.pages.contact.contact');
    }
}