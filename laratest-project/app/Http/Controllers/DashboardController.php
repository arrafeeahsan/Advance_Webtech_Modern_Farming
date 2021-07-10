<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\LoginRequest;

class DashboardController extends Controller
{
    public function index(Request $req){
        //$id = '007';
        //$name = $req->session()->get('uname');
        return view('/dashboard/dashboard');
    }
}
