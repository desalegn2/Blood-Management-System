@extends('nurse.sidebar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>

    <title>View Donor</title>

    <meta nfooter2ame="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div id="page-wrap">
        <h1>Donors Who send request</h1>
        <table>
            <thead>
                <tr>
                    <th>photo</th>
                    <th>First Name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>blood Type</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donors as $donor)
                <tr>
                    <td><img src="{{asset('uploads/registers/'.$donor->photo)}}" width="80" height="80"></td>
                    <td>{{$donor->name}}</td>
                    <td>{{$donor->email}}</td>
                    <td>{{$donor->phone}}</td>
                    <td>{{$donor->bloodtype}}</td>
                    <td>{{$donor->status}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('nurse/viewdetail', $donor->id)}}">View</a>
                    </td>
                    <td>
                        <a href="#delete{{$donor->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>
                        @include('nurse.deleteModal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$donors->links()}}
    </div>
</body>

</html>
@endsection