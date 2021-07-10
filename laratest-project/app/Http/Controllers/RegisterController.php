<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('/register/register');
    }

    public function store(RegisterRequest $req){
        $user = new User;

        $user->name         = $req->name;
        $user->username     = $req->username;
        $user->email        = $req->email;
        $user->password     = $req->password;
        $user->re_pass      = $req->re_pass;
        $user->type         = $req->type;

        $user->save();
        return redirect()->route('login.index');
    }
}
