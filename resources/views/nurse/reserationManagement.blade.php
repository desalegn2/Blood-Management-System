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
    <style>
        #center {
            padding: 6px;
        }

        #date {
            padding: 4px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
                <h1>Donors Who send reservation</h1>

                <div style="color: white; background-color:#0EA293;">
                    @error('date')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <br><br>
                <form action="/nurse/findreservation" method="get">
                    @csrf
                    <div style="float: right;">
                        <input type="date" name=" date" id="date" required>
                        <select name="center" required id="center">
                            <option value="">Choose Centor</option>
                            <option value="poly">Poly</option>
                            <option value="poly">peda</option>
                        </select>
                        &nbsp;&nbsp;
                        <input type="submit" value="Search" class="btn btn-primary btn-sm float-end">
                    </div>
                </form>

                <br><br>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>First Name</th>
                        <th>Phone</th>
                        <th>Center</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $donors)
                        <tr>
                            <td>{{$donors->firstname}}</td>
                            <td>{{$donors->phone}}</td>
                            <td>{{$donors->center}}</td>
                            <td>{{$donors->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('nurse/reservationdetail', $donors->id)}}">View</a>
                                <a href="{{url('nurse/reservationregister',$donors->id)}}" class="btn btn-primary btn-sm float-end"><i classdonor_id='fa fa-edit'></i> Registor</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection