@extends('doctor.sidebar')
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

    <div id="page-wrap">

        <h1>Transfer</h1>
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>blood broup</th>
                    <th>RH- Factor</th>
                    <th>volume</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distributes as $dist)
                <tr>
                    <td>{{$dist->bloodgroup}}</td>
                    <td>{{$dist->rh}}</td>
                    <td>{{$dist->volume}}</td>
                    <td>a</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection