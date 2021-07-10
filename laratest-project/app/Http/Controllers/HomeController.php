<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //check session or cookie

        
        return view('/home/home');
    }
}
