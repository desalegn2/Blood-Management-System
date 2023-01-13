@extends('donor.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBBMS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- ======= Styles ====== -->

    <style>
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
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #8ebf42;
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

    <!-- ======================= Cards ================== -->
    <div class="container mt-5">
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/c.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Send Reservation</h3>
                    <h6>
                        Thank you for your consideration to donate blood and/or platelets for Bahir Dar Blood Bank Center. Your support is vital to continue patient care in Bahir Dar Hospitals.
                    </h6>

                    <h3>Steps to send Reservation</h3>
                    <ul>
                        <li> Log in</li>
                        <li>Click “Register”</li>
                        <li> Fill Registration Form and send Your health information</li>
                        <li>Click History and view your request status </li>
                        <li> If status Apprived, send reservation!</li>
                    </ul>
                    <a href="" style="float: right;">Read more</a>
                </div>

            </div>

        </div>

    </div>
    <div class="main-block">
        <form action=" {{url('/donor/reservation',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <fieldset>
                <legend>
                    <!-- <h3>Fill This Form</h3> -->
                </legend>
                <div class="account-details">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required>
                    <div><label>First Name</label><input type="text" name="firstname" required></div>
                    <div><label>Phone</label><input type="text" name="phone" required></div>
                    <div><label>Last name</label><input type="text" name="lastname" required></div>
                    <div><label>Email</label><input type="text" name="email" required></div>
                    <div><label>Donation Date</label><input type="date" name="reservationdate" required></div>
                    <div><label>Gender</label> <select name="gender" required>
                            <option value="male">male</option>
                            <option value="female">female</option>

                        </select></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <!-- <h3>Fill This Form</h3> -->
                </legend>
                <div class="personal-details">
                    <div>


                        <div>
                            <label>Center</label>
                            <select name="center" required>
                                <option value="Felege">Felege</option>
                                <option value="adama">adama</option>
                                <option value="fhkhfz">Gambi</option>
                                <option value="uyuiay">uyuiay</option>
                                <option value="ljakdaHS">ljakdaHS</option>
                                <option value="buyai">buyai</option>
                                <option value="tiytat">tiytat</option>
                            </select>
                        </div>

                    </div>

                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Terms and Mailing</h3>
                </legend>
                <div class="terms-mailing">
                    <div class="checkbox">
                        <input type="checkbox" name="" required><span>I agree to the information</a></span>
                    </div>
                </div>
            </fieldset>
            <button type="submit" href="">Submit</button>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection