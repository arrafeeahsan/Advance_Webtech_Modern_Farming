<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use validator;
//use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view ('/login/login');
    }

    public function verify(Request $req){ //req object comes from the file we import above from Request class 
        //dd($req); // dd is a debug function

        $result = DB::table('user_table')
                        ->where('username', $req->uname)
                        ->where('password', $req->pass)
                        ->get();
        if(count($result) > 0){
            //session or cookie
            //echo "Valid!";
            $req->session()->put('username', $req->uname);
            return redirect('/dashboard'); //will a generate a http get request, /home is a url here
        }else{
            $req->session()->flash('msg', 'Invalid username or password!');
            return redirect('/login');
        }  
    }
}
