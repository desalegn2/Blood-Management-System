@extends('nurse.side_bar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            margin-top: 50px;
        }

        .card-header {
            background-color: #f0f0f0;
        }
    </style>

</head>

<body>


    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                @foreach($data as $dat)
                <div class="card">
                    <div class="card-header">Labratory Result
                            <a style="float: right;" href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <p>Infectious disease name: {{ $dat->infectious_disease }}</p>
                        <p>Blood pressure: {{ $dat->blood_pressure }}</p>
                        <p>Pulse rate: {{ $dat->pulse_rate }}</p>
                        <p>Homoglobin level: {{ $dat->homoglobin_level }}</p>
                        <p>Cholesterol level: {{ $dat->cholesterol_level }}</p>
                        <p>Blood glucose level: {{ $dat->blood_glucose_level }}</p>
                        <p>Alt level: {{ $dat->alt_level }}</p>
                        <p>Ast level: {{ $dat->ast_level }}</p>
                        <p>Iron level: {{ $dat->iron_level }}</p>
                        <p>Hct: {{ $dat->hct }}</p>
                        <!-- Add more donor information fields here -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
@endsection