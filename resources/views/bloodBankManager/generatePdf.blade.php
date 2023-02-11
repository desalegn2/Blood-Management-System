@extends('bloodBankManager.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">Donors</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                    <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button> -->
                    <h2><a href="{{url('/bbmanager/report')}}">Report</a></h2>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Fulltname</th>
                        <th>Email</th>

                    </thead>
                    <tbody>
                        @if(count($don))
                        @foreach($don as $member)
                        <tr>
                            <td>{{$member->fullname}}</td>
                            <td>{{$member->email}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Data Not Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection