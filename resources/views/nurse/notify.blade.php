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
                <h1>Donors Who Donate Before</h1>

                <form action="{{url('/nurse/datetonotify')}}" method="get">
                    @csrf
                    <div style="float: right;">
                        <b>How Many Days Ago You Notify ?</b><input type="text" name="date" style="width: 200px;" placeholder="enter length of days" required>
                        <input type="submit" value="Enter" style="width: 50px;">
                    </div>
                </form>
                @if(session('success'))
                <div class="alert alert-success">
                    Email Send Sucessfully
                </div>
                @endif
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>blood Type</th>
                            <th>Duration</th>
                            <th>Notify</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($donors))
                        @foreach ($donors as $donor)
                        <tr>
                            <td>
                                <img src="{{asset('uploads/registers/'.$donor->photo)}}" width="80" height="80">
                            </td>
                            <td>{{$donor->firstname}}</td>
                            <td>{{$donor->lastname}}</td>
                            <td>{{$donor->phone}}</td>
                            <td>{{$donor->packno}}</td>
                            <td>{{$donor->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                            <td>
                                <a class="btn btn-success" href="{{url('nurse/email', $donor->donor_id)}}"> Email</a>
                                <a class="btn btn-success" href="{{url('nurse/sms', $donor->donor_id)}}">SMS</a>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>No Donor with This Length of Date</td>
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