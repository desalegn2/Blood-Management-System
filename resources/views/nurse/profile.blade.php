@extends('nurse.sidebar')
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
                    <form action=" {{url('/nurse/updatephoto',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset('uploads/registers/'.$dataprofil->photo)}}" alt="Admin" class="rounded-circle" width="150">

                                    <div class="mt-3">
                                        <h4> {{$dataprofil->name}}</h4>
                                        <p class="text-secondary mb-1">Nurse</p>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class='fa fa-edit'></i>Change Password</button>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Change Photo</h6>

                                    </div>

                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="photo" required>
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
                            <form action="  {{url('/nurse/updateprofile',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
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
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
    <!-- change password Modal -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'nurse/changepassword']) !!}
                    <div class="mb-3">
                        {!! Form::label('oldpassword', 'Old Password') !!}
                        {{ Form::password('password', array('name' => 'oldpassword', "class" => "form-control" ,"placeholder" =>"enter new password")) }}

                    </div>
                    <div class="mb-3">
                        {!! Form::label('newpassword', 'New Password') !!}
                        {{ Form::password('password', array('name' => 'password', "class" => "form-control", "placeholder" =>"enter new password")) }}

                    </div>
                    <div class="mb-3">
                        {!! Form::label('confirmnewpassword', ' Confirm New Password') !!}
                        {{ Form::password('password', array('name' => 'password_confirmation', "class" => "form-control", "placeholder" =>"confirm new password")) }}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Change</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection