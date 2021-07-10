<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddClientController extends Controller
{
    public function index(){
        return view('/addclient/addclient');
    }
}
