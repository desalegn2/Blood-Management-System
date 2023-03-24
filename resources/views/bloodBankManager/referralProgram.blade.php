@extends('bloodBankManager.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        overflow-x: scroll;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
       
    }
    th {
        background-color: #f2f2f2;
        
    }
   
</style>
</head>

<body>
    <div class="row">
        <div class="col-25">
            <label for="fname">list of Referring Donor</label>
        </div>
        <div class="col-75">

        <table>
    <thead>
        <tr>
            <th>Referring User</th>
            <th>Referred User</th>
            <th>Email</th>
            <th>Status</th>
            <th>Number of Referrals</th>
            <th>Number of Donors</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($referrals->groupBy('id') as $referral)
        <tr>
            <td rowspan="{{ count($referral[0]->referredUsers) }}">{{ $referral[0]->name }}</td>
            @foreach ($referral[0]->referredUsers as $key => $referredUser)
            @if ($key > 0)
        </tr>
        <tr>
            @endif
            <td data-label="Referred User">{{ $referredUser->user->name }}</td>
            <td data-label="Email">{{ $referredUser->user->email }}</td>
            <td data-label="Status">{{ $referredUser->status }}</td>
            @if ($key == 0)
            <td rowspan="{{ count($referral[0]->referredUsers) }}" data-label="Number of Referrals">{{ count($referral[0]->referredUsers) }}</td>
            <td rowspan="{{ count($referral[0]->referredUsers) }}" data-label="Number of Donors">{{ count($referral[0]->referredUsers->where('status','=','donated')) }}</td>
            @endif
        @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
            {{ $referrals->links() }}
        </div>
    </div>

</body>

</html>

@endsection