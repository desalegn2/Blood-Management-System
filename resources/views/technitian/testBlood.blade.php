@extends('technitian.side_bar')
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

    <div class="container">

        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
                <h1>Incoming Tested Blood</h1>

                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Pack No</th>
                        <th>Volume</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(count($data))
                        @foreach ($data as $dis)
                        <tr>
                            <td>{{$dis->packno}}</td>
                            <td>{{$dis->volume}}</td>
                            <td>{{$dis->status}}</td>
                            <td>
                                <a href="{{url('technitian/testblood', $dis->id)}}"><i class='fa fa-edit'></i> Test</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>There is No Donation Still Now</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection