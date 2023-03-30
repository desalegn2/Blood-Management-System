@extends('encoder.sidebar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">

        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
            <h1>Record Blood Detail</h1>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>First Name </th>
                        <th>Last Name </th>
                        <th> Blood Type</th>
                        <th>Volume</th>
                        <th>Date</th>
                        <th>Pack No</th>
                        <th>Action</th>

                    </thead>
                    <tbody>
                        @if(count($data))
                        @foreach ($data as $dis)
                        <tr>
                            <td>{{$dis->firstname}}</td>
                            <td>{{$dis->lastname}}</td>
                            <td>{{$dis->bloodtype}}</td>
                            <td>{{$dis->volume}}</td>
                            <td>{{$dis->created_at}}</td>
                            <td>{{$dis->packno}}</td>
                            <td>
                                <a href="{{url('encoder/recordblood', $dis->id)}}"><i class='fa fa-edit'></i> Record</a>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>There is No Donor Who send Reservation</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection