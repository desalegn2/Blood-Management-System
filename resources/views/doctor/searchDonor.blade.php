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
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label> Blood Group</label>
                                    <select class="select2" style="width: 100%;" name="bloodtype">
                                        <option value="">BloodType</option>
                                        <option>A+</Abbr></option>
                                        <option>A-</Abbr></option>
                                        <option>B+</Abbr></option>
                                        <option>B-</Abbr></option>
                                        <option>AB+</Abbr></option>
                                        <option>AB-</Abbr></option>
                                        <option>O+</Abbr></option>
                                        <option>O-</Abbr></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>city:</label>
                                    <input type="text" class="select2" style="width: 100%;" name="city">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>Search
                                    </button>
                                </div>
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