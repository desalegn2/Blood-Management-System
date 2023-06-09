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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #000;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .pagination .page-link:hover {
            color: #000;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #dee2e6;
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
                <h5>Donors Who Donate Before And Next Donation Date is Coming</h5>

                <!-- <form action="{{url('/nurse/datetonotify')}}" method="get">
                    @csrf
                    <div style="float: right;">
                        <b>How Many Days Ago You Notify ?</b><input type="text" name="date" style="width: 200px;" placeholder="enter length of days" required>
                        <input type="submit" value="Enter" style="width: 50px;">
                    </div>
                </form> -->
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

                        @foreach ($data as $donor)
                        @if ($donor->donation->count() > 0)
                        <tr>
                            <td>
                                <img src="{{asset('uploads/registers/'.$donor->photo)}}" width="80" height="80">
                            </td>
                            <td>{{$donor->firstname}}</td>
                            <td>{{$donor->lastname}}</td>
                            <td>{{$donor->phone}}</td>
                            <td>{{$donor->bloodtype}}</td>
                            <td>{{ $donor->donation[0]->created_at }}</td>
                            <!-- <td>{{ \Carbon\Carbon::parse($donor->created_at)->diffForHumans(null, false, true) }}</td> -->
                            <td>
                                <a class="btn btn-success" href="{{url('nurse/email', $donor->donor_id)}}"> Email</a>
                                <!-- <a class="btn btn-success" href="{{url('nurse/sms', $donor->donor_id)}}">SMS</a> -->
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                {{ $data->appends(Request::all())->links() }}
                </div>

            </div>
        </div>
    </div>
</body>

</html>
@endsection