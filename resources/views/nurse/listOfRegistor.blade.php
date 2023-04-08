@extends('nurse.side_bar')
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
    <div id="page-wrap" style="margin-top: 60px; margin-right:30px;">
        <form action="{{url('/nurse/search_donor')}}" method="post">
            @csrf
            <div style="float: right;">
                <input type="text" name="fullname" style="width: 200px;" placeholder="enter name.email,phone" required>
                <input type="submit" >
            </div>
        </form>
        <br> <br>

        <h1>Donors Who Donate Before</h1>
        <p></p>
        <table>
            <thead>
                <tr>
                    <th>photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Duration</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data))
                @foreach ($data as $donor)
                <tr>
                    <td>
                        <img src="{{asset('uploads/registers/'.$donor->photo)}}" width="80" height="80">
                    </td>
                    <td>{{$donor->firstname}}</td>
                    <td>{{$donor->lastname}}</td>
                    <td>{{$donor->phone}}</td>
                    <td>{{ $donor->created_at->diffInDays(\Carbon\Carbon::now()) }} days ago</td>
                    <td>
                        <a href="{{url('nurse/registordon',$donor->donor_id)}}"><i class='fa fa-edit'></i> Registor</a>
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