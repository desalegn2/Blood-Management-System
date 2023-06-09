@extends('nurse.side_bar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <title>History</title>

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

    .pagination .page-item {
        margin: 0 5px;
        list-style: none;
        display: inline-block;
    }

    .pagination .page-item a {
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
        color: #333;
        border-radius: 3px;
    }

    .pagination .page-item.active a {
        background-color: #333;
        color: #fff;
    }

    .pagination .page-item.disabled a {
        opacity: 0.6;
        pointer-events: none;
    }

        .search {
            border: 3px solid black;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 16px;
        }

        .search label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
            margin-right: 10px;
        }

        .search input[type="text"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search input[type="submit"] {
            width: 50px;
            padding: 5px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
                <h5>Donors Who Donate Before</h5>
                <form action="{{url('/nurse/searchdonorhistory')}}" method="get">
                    @csrf
                    <div class="search" style="float: right; margin-bottom:20px;">
                        <label for=""><b>Enter Donor Information</b></label><input type="text" name="data" placeholder="enter firstname,lastname,or phone" required>
                        <input type="submit" value="Enter">
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
                            <th>Number of Donation</th>
                            <th>Action</th>
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
                            <td>{{$donor->donation->count()}}</td>
                            <td>
                                <form method="GET" action="{{ url('/nurse/labresult') }}">
                                    <input type="hidden" name="donor_id" value="{{ $donor->donor_id }}">
                                    <button type="submit" class="btn btn-success">Detail</button>
                                </form>

                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination links -->
                <div class="pagination">
                {{ $data->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection