@extends('bloodBankManager.sidebar')
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

        <h1>Distribute</h1>

        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>Pack No</th>
                    <th>Blood Type</th>
                    <th>Volume</th>
                    <th>Rh</th>
                    <th>Hct</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $stock)
                <tr>
                    <td>{{$stock->packno}}</td>
                    <td>{{$stock->bloodgroup}}</td>
                    <td>{{$stock->volume}}</td>
                    <td>{{$stock->rh}}</td>
                    <td>{{$stock->hct}}</td>
                    <td>{{ $stock->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                    <td>
                        <a href="#distribute{{$stock->id,}}" data-bs-toggle="modal" class="btn btn-info"><i class='fa fa-edit'></i> Distribute</a>
                        @include('bloodBankManager.distModal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection