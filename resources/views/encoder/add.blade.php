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
                                <input type="hidden" id="date" name="fullname" value="{{$data->fullname}}" required>
                                <input type="hidden" id="date" name="email" value="{{$data->email}}" required>
                                <input type="hidden" id="date" name="phone" value="{{$data->phone}}" required>
                                <input type="hidden" id="date" name="state" value="{{$data->state}}" required>
                                <input type="hidden" id="date" name="city" value="{{$data->city}}" required>
                                <input type="hidden" id="date" name="kebelie" value="{{$data->kebelie}}" required>
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
                                            <input type="text" name="donationtype" id="" value="{{$data->donationtype}}" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Donation Type</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="bloodpressure" id="firstName" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Blood Pressure</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="hct" id="" value="" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Hct Level</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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

                                    <!-- <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                                <label class="form-label" for="emailAddress">Email</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                            </div>

                                        </div>
                                    </div> -->
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