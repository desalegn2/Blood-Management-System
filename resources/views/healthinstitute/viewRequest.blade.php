@extends('healthinstitute.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1 class="page-header text-center"></h1>
        <div class="row">

            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <td>BloodGroup</td>
                            <td>Volume</td>
                            <td>Request Date</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dis)
                        <tr>
                            <td>{{$dis->bloodgroup}}</td>
                            <td>{{$dis->volume}}</td>
                            <td>{{$dis->created_at}}</td>
                            <td>{{$dis->status}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
@endsection