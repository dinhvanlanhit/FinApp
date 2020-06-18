<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class MenuController extends Controller
{
    public function getMenu(Request $Request)
    {
        //  return view('AppXeTai.pages.home.home');
         return view(template().'.pages.menu.menu');
    }

}