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
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
            list-style: none;
            display: inline-block;
        }

        .pagination .page-item a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ccc;
            color: #333;
            border-radius: 3px;
        }

        .pagination .page-item.active a {
            background-color: #333;
            color: #fff;
        }

        .pagination .page-item.disabled a {
            opacity: 0.6;
            pointer-events: none;
        }

        .blood-request-table {
            border-collapse: collapse;
            width: 100%;
        }

        .blood-request-table th,
        .blood-request-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .blood-request-table th {
            background-color: #088395;
            color: #333;
        }
    </style>
</head>

<body>

    <div id="page-wrap">

        <h1>Distribute</h1>
        <form action="{{url('/bbmanager/choosebloodtype')}}" method="get">
            @csrf
            <div style="float: right; margin-bottom:10px;">
                <h6>Select BY Blood Type</h6>
                <select class="" name="bloodgroup" style="padding: 8px;">
                    <option value="">Choose Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
                <input type="submit" value="OK" class="btn btn-info btn-block">
            </div>
        </form>

        <table class="blood-request-table">
            <thead>
                <tr style="background-color: cyan;">
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
        <!-- Pagination links -->
        <div class="pagination">
            {{ $data->appends(Request::all())->links() }}
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection