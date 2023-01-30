@extends('admin.sidebars')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <Style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </Style>
</head>

<body>

    <div class="container">
        <div class="main-body">
            <br> <br> <br>

            @foreach ($data as $dataprofil)

            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <form action=" {{url('/admin/updatephoto',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset('uploads/registers/'.$dataprofil->photo)}}" alt="Admin" class="rounded-circle" width="230" height="230">

                                    <div class="mt-3">
                                        <h4> {{$dataprofil->name}}</h4>
                                        <p class="text-secondary mb-1">Bahir Dar Blood Bank Admin</p>
                                        <p class="text-muted font-size-sm"></p>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo</h6>

                                    </div>

                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="photo">
                                        <input type="submit" value="save">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                </div>
                            </div>
                            <form action="  {{url('/admin/updateprofile',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <hr>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> User ID</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name=" user_id" value=" {{ Auth::user()->id }}" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" value="{{$dataprofil->name}}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" value="{{$dataprofil->email}}" readonly>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="phone" value="{{$dataprofil->phone}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" value="edite">
                                    </div>
                                </div>

                        </div>
                    </div>
                    <br><br><br><br>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-left"><i class='fa fa-edit'></i>Change Password</button>
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>


</body>

</html>
@endsection