<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regular;

class RegularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.regular');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.createregular');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regular = new Regular;

        $regular->account_name = $request->accountname;
        $regular->account_number = $request->accountnumber;
        $regular->account_balance = $request->accountbalance;
        $regular->account_category = $request->accountcategory;

        $regular->save();
        return redirect()->route('regular.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $regulars = Regular::all();
        return view('accounts.regularlist')->with('regularlist', $regulars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regular = Regular::find($id);
        return view('accounts.regularedit')->with('regular', $regular);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $regular = Regular::find($id);
        $regular->account_name        = $req->accountname;
        $regular->account_number        = $req->accountnumber;
        $regular->account_balance        = $req->accountbalance;
        $regular->account_category        = $req->accounttype;


        $regular->save();

        return redirect()->route('regular.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
