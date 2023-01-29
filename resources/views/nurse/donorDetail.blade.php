@extends('nurse.sidebar')
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

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Donor Details</b></div>
                <div class="col col-md-6">
                    <!-- <a href="{{url('nurse/back')}}" class="btn btn-primary btn-sm float-end">View All</a> -->
                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-end">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Donor Name</b></label>
                <div class="col-sm-10">
                    {{$donors->name}}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Last Name</b></label>
                <div class="col-sm-10">
                    {{ $donors->lastname }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Email</b></label>
                <div class="col-sm-10">
                    {{ $donors->email }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b> Phone</b></label>
                <div class="col-sm-10">
                    {{ $donors->phone }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Donor Gender</b></label>
                <div class="col-sm-10">
                    {{ $donors->gender }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Donor Blood Type</b></label>
                <div class="col-sm-10">
                    {{ $donors->bloodtype }}
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>Donor weight</b></label>
                    <div class="col-sm-10">
                        {{ $donors->weight }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>Donor Halth Status</b></label>
                    <div class="col-sm-10">
                        {{ $donors->healthstatus }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Birth Date</b></label>
                    <div class="col-sm-10">
                        {{ $donors->bithdate }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>State</b></label>
                    <div class="col-sm-10">
                        {{ $donors->state }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Status</b></label>
                    <div class="col-sm-10">
                        {{ $donors->status }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Image</b></label>
                    <div class="col-sm-10">
                        <img src="{{asset('uploads/registers/'.$donors->photo)}}" width="80" height="80">
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
@endsection