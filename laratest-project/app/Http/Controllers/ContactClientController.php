<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactClientController extends Controller
{
    public function index(){
        return view('/contactclient/contactclient');
    }
}
