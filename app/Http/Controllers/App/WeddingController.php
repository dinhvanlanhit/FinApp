<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class WeddingController extends Controller
{
    public function getWedding(Request $Request)
    {
        return view(template().".pages.wedding.wedding");
    }

}