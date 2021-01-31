<div style="border:1px solid #ccc;width:40%;margin:10px">
    <h2 style="text-align: center">Users who are associated with companies in {{$country->name}}</h2>

    <table style="border:1px solid">
        <thead>
            <tr>
                <th style="border:1px solid">Company</th>
                <th style="border:1px solid">Users</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td style="border:1px solid">{{ucfirst($company->name)}}</td>
                <td style="border:1px solid">
                    <ul>
                    @foreach ($company->users as $user)
                    {{-- {{dd($user->pivot)}} --}}
                        <li>{{$user->name}}</li>
                    @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="border:1px solid #ccc;width:40%;margin:10px">
    <h2 style="text-align: center">All company names the users associated with and associated dates</h2>

    <table style="border:1px solid">
        <thead>
            <tr>
                <th style="border:1px solid">User</th>
                <th style="border:1px solid">Companies</th>
                <th style="border:1px solid">Associated Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td style="border:1px solid">{{$user->name}}</td>
                <td style="border:1px solid">
                    <ul>
                    @foreach ($user->companies as $company)
                        <li>{{ucfirst($company->name)}}</li>
                    @endforeach
                    </ul>
                </td>
                <td style="border:1px solid">
                    <ul>
                        @foreach ($user->companies as $company)
                            <li>{{$company->pivot->created_at}}</li>
                        @endforeach
                    </ul>
                </td>
                
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

