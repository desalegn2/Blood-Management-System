@extends('doctor.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" integrity="sha512-rO7BTsTmR9YNS+2kszOsZTKBszvgvFK34MnKj+n3x8yDkBOyv4vj4g4n/x6N8WUrGLz4skGrlrs+Fw5w6UxL6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-0r1NlKDCGIn2N+axvA8ygN1zbd0U5if6PfKj77FSCZwEa00P4D89j4f4Ux4HbFZB1Y9Y22VZp3qZ3OwUXvvLAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }
</style>
</head>

<body>

    <div class="grey-bg container-fluid mt-1">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">

                    <h4 class="text-uppercase">Total Blood In Our Stock</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="{{url('nurse/aminusdonor')}}">
                                            <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        </a>
                                        <h3><strong>{{$stockInfo->aminus}}</strong></h3>
                                        <span><strong>A-</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->aplus}}</strong></h3>
                                        <span><strong>A+</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->bminus}}</strong></h3>
                                        <span><strong>B-</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->bplus}}</strong></h3>
                                        <span><strong>B+</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->abminus}}</strong></h3>
                                        <span><strong>AB-</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->abplus}}</strong></h3>
                                        <span><strong>AB+</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F55050;"></ion-icon>
                                        <h3><strong>{{$stockInfo->ominus}}</strong></h3>
                                        <span><strong>O-</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$stockInfo->oplus}}</strong></h3>
                                        <span><strong>O+</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <table>
    <thead>
        <tr>
            <th>Hospital Name</th>
            <th>A+</th>
            <th>A-</th>
            <th>B+</th>
            <th>B-</th>
            <th>AB+</th>
            <th>AB-</th>
            <th>O+</th>
            <th>O-</th>
        </tr>
    </thead>
    <tbody>
        @foreach($distributes as $distribute)
            <tr>
                <td>{{ $distribute->hospitalname }}</td>
                <td>{{ $distribute->aplus }}</td>
                <td>{{ $distribute->aminus }}</td>
                <td>{{ $distribute->bplus }}</td>
                <td>{{ $distribute->bminus }}</td>
                <td>{{ $distribute->abplus }}</td>
                <td>{{ $distribute->abminus }}</td>
                <td>{{ $distribute->oplus }}</td>
                <td>{{ $distribute->ominus }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
@endsection