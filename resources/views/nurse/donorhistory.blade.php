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
</head>

<body>

    <div class="container">

        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
                <h5>Donors Who Donate Before</h5>
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
                                <a class="btn btn-success" href=""> ...</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination links -->
                <div class="pagination">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection