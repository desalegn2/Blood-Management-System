<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .card-container {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 150px;
        }

        .card-title {
            margin-bottom: 20px;
            text-align: center;
        }

        .card-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-column {
            flex: 1;

            max-width: 300px;
            margin: 10px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }




        .card-heading {
            margin-top: 0;
        }

        .card-content {
            margin-bottom: 0;
        }

        .footer-bottom {
            background: #E3E3E3;
            border-top: 1px solid #DDDDDD;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .footer-bottom p.pull-left {
            padding-top: 6px;
        }

        @media (max-width: 767px) {
            .card-row {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    @include('navbar')

    <div class="container">
        <div class="intro">
            <h2 class="text-center">Service </h2>
        </div>

        <div class="row people">
            @foreach($data as $service)
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('uploads/registers/'.$service->image)}}"">
                    <h3 class=" name">{{$service->title}}</h3>
                    <p class="description">
                        {{ $service->description}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left" style="text-align:center;"> Copyright © Bahir Dar Blood Bank 2023. All right reserved. </p>

            </div>
        </div>

    </footer>
</body>

</html>