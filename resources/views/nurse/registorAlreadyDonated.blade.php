@extends('nurse.side_bar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>donor enrollment</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        /* =========== Google Fonts ============ */
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        /* =============== Globals ============== */
        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #2a2185;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        /* ======================= Cards ====================== */
        .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
        }

        .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
        }

        .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
        }

        .cardBox .card:hover {
            background: var(--blue);
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx {
            color: var(--white);
        }

        /* ====================== Responsive Design ========================== */

        @media (max-width: 480px) {
            .cardBox {
                grid-template-columns: repeat(1, 1fr);
            }

            .cardHeader h2 {
                font-size: 20px;
            }

            .user {
                min-width: 40px;
            }

            .navigation {
                width: 100%;
                left: -100%;
                z-index: 1000;
            }

            .navigation.active {
                width: 100%;
                left: 0;
            }

            .toggle {
                z-index: 10001;
            }

            .main.active .toggle {
                color: #fff;
                position: fixed;
                right: 0;
                left: initial;
            }
        }

        /* ====================== form style ========================== */


        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            margin: 0;
            font-weight: 400;
        }

        h3 {
            margin: 12px 0;
            color: #8ebf42;
        }

        .main-block {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        form {
            width: 100%;
            padding: 20px;
        }

        fieldset {
            border: none;
            border-top: 1px solid #8ebf42;
        }

        .account-details,
        .personal-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .account-details>div,
        .personal-details>div>div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .account-details>div,
        .personal-details>div,
        input,
        label {
            width: 100%;
        }

        label {
            padding: 0 5px;
            text-align: right;
            vertical-align: middle;
        }

        input {
            padding: 5px;
            vertical-align: middle;
        }

        .checkbox {
            margin-bottom: 10px;
        }

        select,
        .children,
        .gender,
        .bdate-block {
            width: calc(100% + 26px);
            padding: 5px 0;
        }

        select {
            background: transparent;
        }

        .gender input {
            width: auto;
        }

        .gender label {
            padding: 0 5px 0 0;
        }

        .bdate-block {
            display: flex;
            justify-content: space-between;
        }

        .birthdate select.day {
            width: 35px;
        }

        .birthdate select.mounth {
            width: calc(100% - 94px);
        }

        .birthdate input {
            width: 38px;
            vertical-align: unset;
        }

        .checkbox input,
        .children input {
            width: auto;
            margin: -2px 10px 0 0;
        }

        .checkbox a {
            color: #8ebf42;
        }

        .checkbox a:hover {
            color: #82b534;
        }

        button {
            width: 15%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 10px;
            border: none;
            background: #002B5B;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: #82b534;
        }

        @media (min-width: 568px) {

            .account-details>div,
            .personal-details>div {
                width: 50%;
            }

            label {
                width: 40%;
            }

            input {
                width: 60%;
            }

            select,
            .children,
            .gender,
            .bdate-block {
                width: calc(60% + 16px);
            }
        }
    </style>

</head>

<body>

    <div class="main-block mt-5 ml-5">


        <form action="{{url('/nurse/enrolldonor')}}" method="post" enctype="multipart/form-data">

            @csrf
            <h1>Blood Donor Enrollment Form</h1>
            @foreach($donor as $data)
            <fieldset>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <legend>
                    <h3>Donor Information</h3>
                </legend>

                <div class="account-details">

                    <div><label>First Name</label>
                        <h5>: {{$data->firstname}}</h5>
                    </div>
                    <div><label>Age</label>
                        <h5>: {{$data->age}}</h5>
                    </div>
                    <div><label>Last Name</label>
                        <h5>: {{$data->lastname}}</h5>
                    </div>
                    <div><label>Occupation</label>
                        <h5>: {{$data->occupation}}</h5>
                    </div>
                    <div><label>phone</label>
                        <h5>: {{$data->phone}}</h5>
                    </div>

                    <div><label>Weight</label>
                        <h5>: {{$data->weight}}</h5>
                    </div>
                    <div><label>Type of Donation</label>
                        <h5>: Voluntary</h5>
                    </div>
                    <div><label>Height</label>
                        <h5>: {{$data->height}}</h5>
                    </div>

                    <div><label>Gender</label>
                        <h5>: {{$data->gender}}</h5>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Contact Information</h3>
                </legend>
                <div class="personal-details">

                    <div>
                        <div><label>Country</label>
                            <h5>: {{$data->country}}</h5>
                        </div>
                        <div><label>State</label>
                            <h5>: {{$data->state}}</h5>
                        </div>
                        <div><label>City</label>
                            <h5>: {{$data->city}}</h5>
                        </div>
                        <div><label>Zone</label>
                            <h5>: {{$data->zone}}</h5>
                        </div>
                        <div><label>Woreda</label>
                            <h5>: {{$data->woreda}}</h5>
                        </div>
                        <div><label>Kebele</label>
                            <h5>: {{$data->kebelie}}</h5>
                        </div>
                        <div><label>House Number</label>
                            <h5>: {{$data->housenumber}}
                        </div>
                    </div>
                    <div>

                        <div><label> Blood Group</label>
                            <h5>: {{$data->bloodtype}}
                        </div>

                        <div><input type="hidden" name="nurse_id" value="{{ Auth::user()->id }}" required></div>
                        <div><input type="hidden" name="donor_id" value="{{$data->donor_id}}" required></div>
                        <div><input type="hidden" name="reservation_id" value="{{$data->id}}" required></div>
                        <div><label>Weight</label><input type="text" name="weight" required></div>
                        <div style="color: white; background-color:#0EA293;">
                            @error('weight')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div><label>Volume</label><input type="text" name="volume" required></div>
                        @if(session('message'))
                        <div class=" alert alert-info">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div><label>Pack No</label><input type=" text" name="packno" required></div>
                        <div style="color: white; background-color:#0EA293;">
                            @error('packno')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <label>Remark</label>
                            <textarea id="w3review" name="remark" rows="5" cols="30"></textarea>
                        </div>
                        <center> <button type="submit">Register</button></center>
                    </div>
                </div>
            </fieldset>
            @endforeach

        </form>


    </div>

</body>

</html>
@endsection