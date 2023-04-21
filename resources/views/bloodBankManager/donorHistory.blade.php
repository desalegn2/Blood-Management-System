@extends('bloodBankManager.sidebar')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Responsive Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="page-wrap">
        <form action="{{url('/bbmanager/searchdonor')}}" method="post">
            @csrf
            <div style="float: right; margin-top:60px;">
                <input type="text" name="fullname" style="width: 200px; padding:5px;" placeholder="enter name.email,phone" required>
                <input class ="btn btn-primary" type="submit">
            </div>
        </form>
        <br> <br>
        <h1>Donors Result</h1>
        <p></p>
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>Pack No</th>
                    <th>Blood Type</th>
                    <th>Volume</th>
                    <th>Rh</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data))
                @foreach ($data as $donor)
                <tr>
                    <td>{{$donor->packno}}</td>
                    <td>{{$donor->bloodgroup}}</td>
                    <td>{{$donor->volume}}</td>
                    <td>{{$donor->rh}}</td>
                    <td>{{ $donor->created_at}}</td>
                    <td>
                        <a href="#sendmessage{{$donor->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-envelope'></i> email</a>
                        <a href="#sendmessage{{$donor->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-sms'></i> sms</a>
                        @include('bloodBankManager.sendmodal')
                    </td>
                </tr>
                @endforeach
                <br><br>
                @else
                <tr>
                    <td> Donor With this Input</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{$data->links()}}
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection