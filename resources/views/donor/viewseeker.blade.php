@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .team {
            padding: 60px 0;
            overflow: hidden;
            margin-left: 50px;
            margin-right: 50px;
            
        }

        .team .member {
            position: relative;
            padding: 30px;
            box-shadow: 0px 2px 15px #181D31;
            border-radius: 5px;
            background: #FAF8F1;
        }

        .team .member .teampic {
            overflow: hidden;
            width: 180px;
            border-radius: 50%;
        }

        .team .member .member-info {
            padding-left: 30px;
        }

        .team .member h2 {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 20px;
            color: green;
        }

        .team .member span {
            display: block;
            font-size: 15px;
            padding-bottom: 10px;
            position: relative;
            font-weight: 500;
        }

        .team .member span::after {
            content: "";
            position: absolute;
            display: block;
            width: 50px;
            height: 2px;
            background: black;
            bottom: 0;
            left: 0;
        }

        .team .member p {
            margin: 10px 0 0 0;
            font-size: 14px;
        }

        .team .member .social {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .team .member .social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;
        }

        .team .member .social a i {
            color: tomato;
            font-size: 16px;
            margin: 0 2px;
        }

        .team .member .social a:hover {
            background: tomato;
        }

        .team .member .social a:hover i {
            color: white;
        }

        .team .member .social a+a {
            margin-left: 8px;
        }

        .team .row {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .team .col-lg-4 {
            flex: 0 0 33.33%;
            max-width: 33.33%;
            padding: 15px;
        }

        .section-title .underline {
            width: 150px;
            height: 1px;
            background-color: black;
            margin: auto;
        }

        .section-title h2 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 20px;
            position: relative;
            color: tomato;
        }

        .section-title h2 {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <section class="team">
        <div class="section-title">
            <h2>These People Need Help from Donors</h2>
            
        </div>
        <div class="row">
            <!-- one card -->
            @foreach ($views as $view)
            <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                    <div class="teampic">
                        <img class="img-fluid" src="{{asset('uploads/registers/'.$view->photo)}}" alt="Image not displaying">
                    </div>
                    <div class="member-info">
                        <h2>From: {{$view->hospitalname}}</h2>
                        @php
                        $createdAt = \Carbon\Carbon::parse($view->created_at);
                        @endphp
                        <h4>{{ $createdAt->diffInDays(\Carbon\Carbon::now()) }} Days ago</h4>
                        <small class="text-muted">{{ $view->created_at}}</small>
                        <span>
                            <b>Patient name:</b>{{$view->firstname}} {{$view->lastname}}
                        </span>
                        <p><b>Gender:</b>{{$view->gender}}</p>
                        <p><b>Age:</b>{{$view->age}}</p>
                        <p><b>Blood Type:</b>{{$view->bloodtype}}</p>
                        <p><b>Email:</b>{{$view->email}}</p>
                        <p><b>Patient phone:</b>{{$view->phone}}</p>
                        <p>
                            <b>Reason:</b>{{$view->reason}}
                        </p>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Bootstrap Bundle JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection