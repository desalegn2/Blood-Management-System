<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .team-boxed {
            color: #313437;
            background-color: #FF8E9E;
        }

        .team-boxed p {
            color: #7d8285;
        }

        .team-boxed h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .team-boxed h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-boxed .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-boxed .intro p {
            margin-bottom: 0;
        }

        .team-boxed .people {
            padding: 50px 0;
        }

        .team-boxed .item {
            text-align: center;
        }

        .team-boxed .item .box {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .team-boxed .item .name {
            font-weight: bold;
            margin-top: 28px;
            margin-bottom: 8px;
            color: inherit;
        }

        .team-boxed .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #d0d0d0;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .team-boxed .item .description {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .team-boxed .item img {
            max-width: 160px;
        }

        .team-boxed .social {
            font-size: 18px;
            color: #a2a8ae;
        }

        .team-boxed .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-boxed .social a:hover {
            opacity: 1;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Voluntary Donors </h2>

        </div>
        <a class="btn btn-success" href="">Home</a>
        <div class="row people">
            @foreach ($data as $x)
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="{{asset('uploads/registers/'.$x->photo)}}">
                    <h3 class="name">{{$x->name}}</h3>
                    <p class="title">{{$x->email}}</p>
                    <p class="description">{{$x->phone}}</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:{{$x->email}}">Send Reservation</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</body>

</html>