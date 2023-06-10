@extends('nurse.side_bar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <title>History</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #000;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .pagination .page-link:hover {
            color: #000;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
                <h5>Labratory Rwsult</h5>
                <a style="float: right; margin-bottom:10px;" href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-end">Back</a>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Date of Donation</th>
                            <th>Infectious disease</th>
                            <th>Blood Type</th>
                            <th>RH</th>
                            <th>Blood pressure</th>
                            <th>Puls rate</th>
                            <th>Alt level </th>
                            <th>Ast level</th>
                            <th>Blood Pressure </th>
                            <th> homoglobin level</th>
                            <th>cholesterol level</th>
                            <th>iron level</th>
                            <th>glucose_level</th>
                            <th>HCT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        @foreach ($row->bloodStocks as $bloodStock)
                        <tr>
                            <td>{{ $bloodStock->created_at }}</td>
                            <td>{{ $row->infectious_disease }}</td>
                            <td>{{ $bloodStock->bloodgroup}}</td>
                            <td>{{ $bloodStock->rh}}</td>
                            <td>{{ $row->blood_pressure }}</td>
                            <td>{{ $row->pulse_rate }}</td>
                            <td>{{ $row->alt_level }}</td>
                            <td>{{ $row->ast_level }}</td>
                            <td>{{ $row->blood_pressure}}</td>
                            <td>{{ $row->homoglobin_level }}</td>
                            <td>{{ $row->cholesterol_level }}</td>
                            <td>{{ $row->iron_level }}</td>
                            <td>{{ $row->blood_glucose_level }}</td>
                            <td>{{ $row->hct}}</td>

                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination links -->
                <div class="pagination">
                    {{ $data->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection