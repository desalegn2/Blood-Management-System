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

        /* CSS for the dropdown menu */
        .dropdown-content {
            display: none;
            text-decoration: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .search {
            border: 3px solid black;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 16px;
        }

        .search label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
            margin-right: 10px;
        }

        .search input[type="text"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search input[type="submit"] {
            width: 50px;
            padding: 5px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
                <h5>Labratory Result</h5>

                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Pack Number </th>
                            <th> Blood Type</th>
                            <th>Blood Volume</th>
                            <th>RH</th>
                            <th>Lab Technician</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        @php
                        $index = $loop->index;
                        @endphp
                        <tr>
                            <td>{{ $row->packno }}</td>
                            <td>{{ $row->bloodgroup }}</td>
                            <td>{{ $row->volume }}</td>
                            <td>{{ $row->rh }}</td>
                            <td>{{ $row->staff->firstname }}</td>
                            <td>
                                <!-- Button to trigger the dropdown menu -->
                                <a href="#" class="btn btn-primary" onclick="toggleDropdown(event, {{ $index }})">...</a>
                                <div id="myDropdown{{ $index }}" class="dropdown-content">
                                    <a href="{{ url('/nurse/discardDonor',$row->donor_id) }}">Donor Detail</a><br><br>
                                    <a href="{{ url('/nurse/discrdlabresult',$row->test_id) }}">Lab Result</a>
                                </div>
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
        </div>
    </div>
    <script>
        function toggleDropdown(event, index) {
            event.preventDefault();
            var dropdown = document.getElementById("myDropdown" + index);
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }
    </script>
</body>

</html>
@endsection