@extends('technitian.side_bar')
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

        #discard-btn {
            background-color: red;
            color: white;

        }

        #store-btn {
            background-color: green;
            color: white;
            margin-right: 20px;
            /* add a 10-pixel gap to the right */
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

                            <form action="{{ route('technitian.stock') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required>
                                <input type="hidden" name="donor_id" value="{{$data->donor_id}}" required>
                                <div class="row">

                                    <div class="row">
                                        <div class="col-12">

                                            <select class="select form-control-lg" name="bloodgroup">
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
                                            <label class="form-label">Blood Type</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('bloodgroup')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="volume" value="{{$data->volume}}" class="form-control form-control-lg" readonly />
                                            <label class="form-label">Volume in ML</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="packno" value="{{$data->packno}}" class="form-control form-control-lg" readonly />
                                            <label class="form-label">Pack Number</label>
                                            <div style="color: red;">
                                                @error('packno')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">RH</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rh" value="Rh-positive" />
                                                <label class="form-check-label">Positive</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rh" value="Rh-negative" />
                                                <label class="form-check-label">Negative</label>
                                            </div>
                                        </div>
                                        <div style="color: red;">
                                            @error('rh')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="hct" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Hct Level</label>
                                        </div>

                                        <div style="color: red;">
                                            @error('hct')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_pressure" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Blood Pressure</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('blood_pressure')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="pulse_rate" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Pulse Rate</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('pulse_rate')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="homoglobin_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Homoglobin Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('homoglobin_level')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="cholesterol_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Cholesterol Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('cholesterol_level')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="ast" value="" class="form-control form-control-lg" />
                                            <label class="form-label">AST Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('blood_temprature')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="blood_glucose_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Blood Glucose Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('blood_glucose_level')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="alt" value="" class="form-control form-control-lg" />
                                            <label class="form-label">ALT Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('blood_viscosity')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="iron_level" value="" class="form-control form-control-lg" />
                                            <label class="form-label">Iron Level</label>
                                        </div>
                                        <div style="color: red;">
                                            @error('iron_level')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input class="form-control form-control-lg" type="text" name="diseases" value="{{ old('diseases') }}">
                                            <label class="form-label">Type of Diseases</label>
                                        </div>

                                        @error('diseases')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status" value="accept" {{ old('status') == 'accept' ? 'checked' : '' }}>
                                                <label class="form-check-label">Accept</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status" value="discard" {{ old('status') == 'discard' ? 'checked' : '' }}>
                                                <label class="form-check-label">Discard</label>
                                            </div>
                                        </div>


                                        @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-4 pt-2">
                                    <button class="btn btn-primary btn-lg" type="submit" id="store-btn">Store</button>
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