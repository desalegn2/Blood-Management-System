@extends('encoder.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .gradient-custom {
            /* fallback for old browsers */

            overflow-y: scroll;
            /* Chrome 10-25, Safari 5.1-6 
            background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

            W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+
            background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
            */
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Blood</h3>

                            <form action="{{url('/encoder/addbloods',$data->id)}}" method="post">
                                @csrf


                                <input type="hidden" id="date" name="user_id" value="{{Auth::user()->id}}" required>
                                <input type="hidden" id="date" name="donor_id" value="{{$data->id}}" required>
                                <input type="hidden" id="date" name="Weight" value="{{$data->weight}}" required>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12">

                                            <select class="select form-control-lg" name="bloodtype" required>
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
                                            <br>
                                            <label class="form-label">Choose Blood Type</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="volume" id="firstName" value="{{$data->volume}}" class="form-control form-control-lg" readonly />
                                            <label class="form-label" for="firstName">Volume in ML</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="packno" id="" value="{{$data->packno}}" class="form-control form-control-lg" readonly />
                                            <label class="form-label" for="firstName">Pack Number</label>
                                            <div style="color: red;">
                                                @error('packno')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">RH</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rh" id="femaleGender" value="Rh-positive" checked />
                                                <label class="form-check-label" for="femaleGender">Positive</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rh" id="maleGender" value="Rh-negative" />
                                                <label class="form-check-label" for="maleGender">Negative</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="hct" id="hct" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="hct">Hct Level</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_pressure" id="blood_pressure" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="blood_pressure">Blood Pressure</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="pulse_rate" id="pulse_rate" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="pulse_rate">Pulse Rate</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="homoglobin_level" id="homoglobin_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="homoglobin_level">Homoglobin Level</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_temprature" id="blood_temprature" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="blood_temprature">Blood Temprature</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="cholesterol_level" id="cholesterol_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="cholesterol_level">Cholesterol Level</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_glucose_level" id="blood_glucose_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="blood_glucose_level">Blood Glucose Level</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_viscosity" id="blood_viscosity" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="blood_viscosity">Blood Viscosity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="iron_level" id="iron_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="iron_level">Iron Level</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    <input class="btn btn-primary btn-lg" type="reset" value="Reset" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
</body>

</html>
@endsection