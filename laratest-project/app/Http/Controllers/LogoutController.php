<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\Request;

class LogoutController extends Controller
{
    public function index(Request $req){

        $req->session()->flush();

        return redirect()->route('login.index');
    }
}
