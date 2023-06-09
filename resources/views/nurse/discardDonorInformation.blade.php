@extends('nurse.side_bar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="card" style="margin-top: 50px;">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Donor Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-end">Back</a>
                </div>
            </div>
        </div>
        @foreach($data as $donors)
        <div class="card-body">
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Photo</b></label>
                <div class="col-sm-10">
                    <img src="{{asset('uploads/registers/'.$donors->photo)}}" width="80" height="80">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Donor Name</b></label>
                <div class="col-sm-10">
                    {{$donors->firstname}} {{$donors->lastname}}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b> Age</b></label>
                <div class="col-sm-10">
                    {{ $donors->age }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b> Blood Type</b></label>
                <div class="col-sm-10">
                    {{ $donors->bloodtype }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b> Gender</b></label>
                <div class="col-sm-10">
                    {{ $donors->gender }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b> Phone</b></label>
                <div class="col-sm-10">
                    {{ $donors->phone }}
                </div>
            </div>
            
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Donor Ocution</b></label>
                <div class="col-sm-10">
                    {{ $donors->occupation }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>State</b></label>
                <div class="col-sm-10">
                    {{ $donors->state }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Zone</b></label>
                <div class="col-sm-10">
                    {{ $donors->zone }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>City</b></label>
                <div class="col-sm-10">
                    {{ $donors->city }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Woreda</b></label>
                <div class="col-sm-10">
                    {{ $donors->woreda }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Kebelie</b></label>
                <div class="col-sm-10">
                    {{ $donors->kebelie }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>House Number</b></label>
                <div class="col-sm-10">
                    {{ $donors->housenumber }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>
@endsection