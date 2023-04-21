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
                    <th>Hospital</th>
                    <th>Pack Number</th>
                    <th>Quantity</th>
                    <th>Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $distribution)
                <tr>
                    <td>{{ $distribution->hospital->hospitalname }}</td>
                    <td>{{ $distribution->stock->packno }}</td>
                    <td>{{ $distribution->stock->volume }}</td>
                    <td>{{ $distribution->stock->expitariondate }}</td>
                    <td>
                        <a href="#bloodjornymessage{{$distribution->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-envelope'></i> email</a>
                        <a href="bloodjornymessage{{$distribution->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-sms'></i> sms</a>
                        @include('bloodBankManager.bloodJornyModal')
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