@if(isset($details))
        <br>
        <!-- <p> The Search results for your query <b> {{ $query }} </b> are :</p> -->
        <br>
    <h2>The Search results for your query <b> {{ $query }} </b> are :</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Regular Account</th>
                <th>Loan Account</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $client)
            <tr>
                <td>{{$client->client_name}}</td>
                <td>{{$client->client_username}}</td>
                <td>{{$client->client_email}}</td>
                <td>{{$client->account_nameR}}</td>
                <td>{{$client->account_nameL}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif