@extends('technitian.side_bar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood </title>
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
                <h1> Shelf Life</h1>
                <p>PACKED RED BLOOD CELLS (PRBCS) are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).</p>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Blood Group</th>
                        <th>Volume</th>
                        <th>Pack Number</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(count($blood))
                        @foreach ($blood as $bloods)
                        <tr>
                            <td>{{$bloods->bloodgroup}}</td>
                            <td>{{$bloods->volume}}</td>
                            <td>{{$bloods->packno}}</td>
                            <td scope="row">{{ $bloods->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                            <td>
                                @if($bloods->created_at->diffInDays(\Carbon\Carbon::now()) >25)
                                Expired
                                @else
                                {{$bloods->created_at->diffInDays(\Carbon\Carbon::now()) - 25}} Days left
                                @endif
                            </td>
                            <td>
                                <a href="#discard{{$bloods->id}}" data-bs-toggle="modal" class="btn btn-info"><i class='fa fa-delete'></i> Discard</a>
                                @include('technitian.discardModal')
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>There is No Blood in Stock</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $blood->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</body>

</html>
@endsection