@extends('nurse.side_bar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <title>Reservation</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h1>Donors Who send reservation</h1>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>First Name</th>
                        <th>Phone</th>
                        <th>Center</th>
                        <th>Reservationdate</th>
                        <th>Action</th>
                        
                    </thead>
                    <tbody>
                        @if(count($accepts))
                        @foreach ($accepts as $donors)
                        <tr>
                            <td>{{$donors->firstname}}</td>

                            <td>{{$donors->phone}}</td>

                            <td>{{$donors->center}}</td>
                            <td>{{$donors->reservationdate}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('nurse/reservationdetail', $donors->id)}}">View</a>
                                <a href="{{url('nurse/reservationregister',$donors->id)}}" class="btn btn-primary btn-sm float-end"><i class='fa fa-edit'></i> Registor</a>
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
</body>

</html>
@endsection