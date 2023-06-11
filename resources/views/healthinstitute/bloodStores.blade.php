@extends('healthinstitute.sidebar')
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

    <div id="page-wrap" style="margin-top: 50px;">

        <h1>Blood Store </h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>blood broup</th>
                    <th>RH- Factor</th>
                    <th>volume</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockInfo as $blood)
                <tr>
                    <td>{{$blood->bloodgroup}}</td>
                    <td>{{$blood->rh}}</td>
                    <td>{{$blood->volume}}</td>
                    <td>{{$blood->expitariondate}}</td>
                    <td scope="row">{{ \Carbon\Carbon::parse($blood->created_at)->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                    <td>
                        <a href="#discard{{$blood->id}}" data-bs-toggle="modal" class="btn btn-info">Discard</a>
                        @include('healthinstitute.storeModal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $stockInfo->appends(Request::all())->links() }}
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection