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
                <div class="col col-md-6"><b>Seeker Details</b></div>
                <div class="col col-md-6">
                    <a href="{{url('donor/viewseeker')}}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Seeker Name</b></label>
                <div class="col-sm-10">
                    {{$seekers->name}}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Last Name</b></label>
                <div class="col-sm-10">
                    {{ $seekers->lastname }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Email</b></label>
                <div class="col-sm-10">
                    {{ $seekers->email }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b> Phone</b></label>
                <div class="col-sm-10">
                    {{ $seekers->phone }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b> Gender</b></label>
                <div class="col-sm-10">
                    {{ $seekers->gender }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b> Blood Type</b></label>
                <div class="col-sm-10">
                    {{ $seekers->bloodtype }}
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>When Nedded</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->whenneed }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>Amount</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->amount }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>City</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->city }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>State</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->state }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Hospital</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->hospital }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Purpose</b></label>
                    <div class="col-sm-10">
                        {{ $seekers->purpose }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"><b>Image</b></label>
                    <div class="col-sm-10">
                        <img src="{{asset('uploads/registers/'.$seekers->photo)}}" width="80" height="80">
                    </div>
                </div>
            </div>
        </div>

</body>

</html>