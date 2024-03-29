@extends('healthinstitute.sidebar')
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

    <div id="page-wrap" style="margin-top:60px;">

        <h1>My Blood Request History</h1>

        <table class="blood-request-table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Approved By</th>
                    <th>Accepted</th>
                    <th>Blood Type</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $history)
                <tr>
                    <td>{{ $history->status }}</td>
                    <td>{{ $history->approved_by }}</td>
                    <td>{{ $history->accepted ? 'true' : 'false' }} </td>
                    <td>
                        @foreach($history->bloodRequestItems as $item)
                        {{ $item->blood_type }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($history->bloodRequestItems as $item)
                        {{ $item->quantity }}<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="#accept{{$history->id}}" data-bs-toggle="modal" class="btn btn-info">Accept</a>
                        @include('healthinstitute.accept')
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->appends(Request::all())->links() }}
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection