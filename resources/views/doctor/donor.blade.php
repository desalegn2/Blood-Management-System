@extends('doctor.sidebar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Blood Donor List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 50px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        .donor-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-left: 70px;
        }

        .donor-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .donor-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .donor-blood-type {
            font-size: 16px;
            color: #888;
        }

        .donor-photo {
            text-align: center;
            margin-bottom: 10px;
        }

        .donor-photo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .donor-info {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        @media only screen and (max-width: 768px) {
            .donor-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <h1 style="margin-top: 50px;">Blood Donor List</h1>
    <div class="donor-list">
        @foreach($data as $dat)
        <div class="donor-card">
            <div class="donor-photo">
                <img src="{{asset('uploads/registers/'.$dat->photo)}}" alt="Donor Photo">
            </div>
            <div class="donor-name">Full Name: {{$dat->firstname}} {{$dat->lastname}}</div>
            <div class="donor-info">Blood Type: {{$dat->bloodtype}}</div>
            <div class="donor-info">Phone: {{$dat->phone}}</div>
            <div class="donor-info">State: {{$dat->state}}</div>
            <div class="donor-info">Zone: {{$dat->zone}}</div>
            <div class="donor-info">City: {{$dat->city}}</div>
            <!-- <div class="donor-info">Last Donation Date: ---</div> -->
            @if ($dat->donation->count() > 0)
            @php
            $lastDonation = $dat->donation->sortByDesc('created_at')->first();
            @endphp
            <div class="donor-info">Last Donation Date: {{ $lastDonation->created_at }}</div>
            @else
            <div class="donor-info">No donations recorded.</div>
            @endif
        </div>
        @endforeach
    </div>
</body>

</html>
@endsection