@extends('doctor.sidebar')
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
        body {
            font-family: Arial, sans-serif;
        }

        .content-header {
            margin-top: 50px;
        }

        .container-fluid {
            margin-top: 30px;
        }

        .display-4 {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .select2 {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-row .btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="content-wrapper mb-5">
        <section class="content-header">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search Donor</h2>
            </div>
        </section>

        <div class="container-fluid">
            <form action="search" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bloodtype">Blood Group:</label>
                                <select class="select2" id="bloodtype" name="bloodtype">
                                    <option value="">BloodType</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="select2" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-default">
                                    <i class="fa fa-search"></i>Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('sweetalert::alert')
</body>

</html>

@endsection