<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Input;

use App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function index(){
        return view('/client/client');
    }

    public function create(){
        return view('client.create');
    }

    public function insert(Request $req){
        $client = new Client;

        $client->client_name        = $req->clientname;
        $client->client_username    = $req->clientusername;
        $client->client_email       = $req->clientemail;
        $client->client_password    = $req->clientpassword;
        $client->account_nameR      = $req->accountregular;
        $client->account_nameL      = $req->accountloan;

        $client->save();
        return redirect()->route('client.list');
        
    }

    public function details($id){
        
        $client = Client::find($id);
        return view('client.details')->with('client', $client);
    }

    //public function details(){
    //    return view('/client/detailsTEST');
    //}

    public function edit($id){
        $client = Client::find($id);
        return view('client.edit')->with('client', $client);  
    }

    public function update(Request $req, $id){
        $client = Client::find($id);
        $client->client_name        = $req->name;
        $client->client_username    = $req->username;
        $client->client_email       = $req->email;
        $client->client_password    = $req->password;
        $client->account_nameR      = $req->accountregular;
        $client->account_nameL      = $req->accountloan;

        $client->save();

        return redirect()->route('client.list');
    }

    public function delete($id){
        $client = Client::find($id);
        return view('client.delete')->with('client', $client);
    }

    public function destroy($id){
        $client = Client::find($id);
        $client->delete($id);
        return redirect()->route('client.list');
    }

    public function list(){
        $clients = Client::all();
        return view('client.clientlist')->with('clientlist', $clients);
    }

    public function search(){
        return view('client.search');
    }

    public function searching(Request $req){
        $q = $req->q;
        if($req->ajax()){
            $clients = Client::where('client_name', 'LIKE', '%'.$q.'%')
                            ->orWhere('client_email', 'LIKE', '%'.$q.'%')
                            ->get();
            $output = '<tr>'.
                      '<td>'.'Name'.'</td>'.
                      '<td>'.'Username'.'</td>'.
                      '<td>'.'Email'.'</td>'.
                      '<td>'.'Regular Account'.'</td>'.
                      '<td>'.'Loan Account'.'</td>'.
                      '</tr>';
        if (count($clients)>0) {
        //    return view('client.searchresult')->withDetails($client)->withQuery($q);
            if($clients){
                foreach ($clients as $key=>$client){
                    $output = '<tr>'.
                             '<td>'.$client->client_name.'</td>'.
                             '<td>'.$client->client_username.'</td>'.
                             '<td>'.$client->client_email.'</td>'.
                             '<td>'.$client->account_nameR.'</td>'.
                             '<td>'.$client->account_nameL.'</td>'.
                             '</tr>';
                }
                return Response($output);
            }    
        }else{
            $output = '<tr>'. 
                        '<td>'.'No results!'.'</td>'.
                      '</tr>';
                    return Response($output);
            }
        }
        
    }

    public function getClientList(){

    }

    public function dwonload(){

        return Excel::download(new ClientsExport, 'Clients.xlsx'); 
    }
}
