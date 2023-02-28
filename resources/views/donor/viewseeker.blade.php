@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .team.member {
            position: relative;
            padding: 30px;
            box-shadow: 0px 2px 15px #181D31;
            border-radius: 5px;
            background: #FAF8F1;
        }

        .team.member.teampic {
            overflow: hidden;
            width: 180px;
            border-radius: 50%;
        }

        .team.member .member-info {
            padding-left: 30px;
        }

        .team.member h2 {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 20px;
            color: green;
        }

        .team.member span {
            display: block;
            font-size: 15px;
            padding-bottom: 10px;
            position: relative;
            font-weight: 500;

        }

        .team.member span::after {
            content: "";
            position: absolute;
            display: block;
            width: 50px;
            height: 2px;
            background: black;
            bottom: 0;
            left: 0;
        }

        .team.member p {
            margin: 10px 0 0 0;
            font-size: 14px;
        }

        .team.member.social {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .team.member.social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;
        }

        .team.member.social a i {
            color: tomato;
            font-size: 16px;
            margin: 0 2px;
        }

        .team.member.social a :hover {
            background: tomato;

        }

        .team.member.social a :hover i {
            color: white;

        }

        .team.member.social a+a {
            margin-left: 8px;

        }

        section {
            padding: 60px 0;
            overflow: hidden;
        }

        .underline {
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
    <section class="team" style="margin: 0;
            padding: 0;  padding: 60px 0;
            overflow: hidden;">
        <div class="container">
            <div class="section-title">
                <h2 style="font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 20px;
            position: relative;
            color: green; 
            margin-top: 20px;">These Person The Need Help Of Donor </h2>
                <div class="underline" style="width: 150px;
            height: 1px;
            background-color: black;
            margin: auto;"></div>

                <p></p>
            </div>
            <div class="row">
                <!-- one card -->
                @foreach ($views as $view)
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start" style="position: relative;
            padding: 30px;
            box-shadow: 0px 2px 15px #181D31;
            border-radius: 5px;
            background: #FAF8F1;">

                        <div class="teampic" style="    overflow: hidden;
            width: 400px;">
                            <img class="img-fluid" src="{{asset('uploads/registers/'.$view->photo)}}" alt="Image not display">
                        </div>
                        <div class="member-info" style="padding-left: 30px;">
                            <h2 style="font-weight: 700;
            margin-bottom: 5px;
            font-size: 20px;
            color: red;">From:{{$view->name}} </h2>
                            <h4>{{ $view->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</h4>
                            <small class="text-muted">{{ $view->created_at}}</small>
                            <span style="display: block;
            font-size: 15px;
            padding-bottom: 10px;
            position: relative;
            font-weight: 500;">Patiant name:{{$view->patientname}} {{$view->lastname}}</span>

                            <h5>Patiant email:{{$view->email}}</h5>
                            <h5>Patiant phone:{{$view->phone}}</h5>
                            <p style="margin: 10px 0 0 0;
            font-size: 14px;">Reason :Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum a at ipsum ab magnam omnis pariatur provident nisi corrupti molestias, qui blanditiis ratione obcaecati perferendis enim ullam expedita delectus iure.</p>

                            <div class="social" style="margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;">
                                <a href="" style="display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;">
                                    <i class="bi bi-facebook" style="color: tomato;
            font-size: 16px;
            margin: 0 2px;"></i></a>
                                <a href="" style="display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;">
                                    <i class="bi bi-telegram" style="color: tomato;
            font-size: 16px;
            margin: 0 2px;"></i></a>

                            </div>
                            <div class="card-footer">
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</body>

</html>
@endsection