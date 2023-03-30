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

    <div id="page-wrap">


        <h1>{{$bloodtype}} Blood donors</h1>



        <p></p>

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>blood Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data))
                @foreach ($data as $donor)
                <tr>
                    <td>{{$donor->fullname}}</td>
                    <td>{{$donor->email}}</td>
                    <td>{{$donor->phone}}</td>
                    <td>{{$donor->bloodtype}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('nurse/donordetail', $donor->id)}}">Detail</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>There is No Donor with This Blood Type</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
@endsection