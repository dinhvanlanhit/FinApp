<?php

namespace App\Http\Controllers\AdminApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Users;
use File;
class PaymentController extends Controller
{
    public function getPayMent(Request $Request,int $id=null)
    {
        return view(templateAdminApp().'.pages.payment.payment');
    }

}