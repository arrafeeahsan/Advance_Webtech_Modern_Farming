<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index(){
        return view('/accounts/loan');
    }
    public function create(){
        return view('/accounts/createloan');
    }

    public function insert(Request $req){
        $loan = new Loan;
        $loan->loan_name = $req->loanname;
        $loan->loan_number = $req->loannumber;
        $loan->loan_status = $req->loanstatus;
        $loan->loan_balance = $req->loanbalance;
        $loan->loan_category = $req->loancategory;

        $loan->save();
        return redirect()->route('loan.list');
    }

    public function list(){
        $loans = Loan::all();
        return view('accounts.loanlist')->with('loanlist', $loans);
    }

    public function category(){
        return view('/accounts/loancategory');
    }

    public function apply(){
        return view ('/accounts/loanapplication');
    }

    public function applied(Request $req){
        $loan = new Loan;
        $loan->loan_name = $req->loanname;
        $loan->loan_number = $req->loannumber;
        $loan->loan_status = $req->loanstatus;
        $loan->loan_balance = $req->loanbalance;
        $loan->loan_category = $req->loancategory;

        $loan->save();
        return redirect()->route('loan.list');
    }

    public function approval(Request $req, $id){
        $loan = Loan::find($id);
        $loan->approved = $req->has('approved');
        //'approved' -> $req->has('approved');
        $loan->save();

        return redirect()->route('loan.list');
    }
}
