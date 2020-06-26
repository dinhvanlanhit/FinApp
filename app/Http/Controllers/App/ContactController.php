<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use Auth;
class ContactController extends Controller
{
    public function getContact(Request $Request)
    {
        return view(template().".pages.contact.contact");
    }

}