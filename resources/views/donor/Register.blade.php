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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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
                <div class="card col-md-8 ml-5">

                    <h3 class="card-title mt-2">WHO CAN DONATE?</h3>
                    <h4>Register to be a blood donor, give blood and save lives.</h4>
                    <h4>Name of Office: Bahir Dar Voluntary Blood Services Program</h4>
                    <h5>Basic requirement of a potential blood donor: </h5>
                    <ul>
                        <li> Weight: At least 110 lbs (50 kg)</li>
                        <li> Blood volume collected will depend mainly on you body weight.</li>
                        <li>Pulse rate: Between 60 and 100 beats/minute with regular rhythm.</li>
                        <li> Blood pressure: Between 90 and 160 systolic and 60 and 100 diastolic.</li>
                        <li>Hemoglobin: At least 125 g/L</li>
                    </ul>
                    <h2>Health:</h2>
                    <p class="card-text mb-4">You must be in good health at the time you donate.

                        You cannot donate if you have a cold, flu, sore throat, cold sore, stomach bug or any other infection.

                        If you have recently had a tattoo or body piercing you cannot donate for 6 months from the date of the procedure. If the body piercing was performed by a registered health professional and any inflammation has settled completely, you can donate blood after 12 hours.

                        If you have visited the dentist for a minor procedure you must wait 24 hours before donating; for major work wait a month.

                        You must not donate blood If you do not meet the minimum haemoglobin level for blood donation

                        <br> <b>* A test will be administered at the donation site.</b>
                    </p>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" style="width:236px; height:400px" src="{{asset('assets/imgs/c.jpg')}}" alt="...">
                    <!-- <h3 class="card-title mt-2">Title</h3>
                    <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates corrupti possimus quae quidem itaque voluptatum, delectus quo soluta voluptate sequi dignissimos eos sint neque! Possimus cumque magnam excepturi necessitatibus obcaecati?</p>
                    <button class="mb-4" href="" style="float: right;">share </button>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                        <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                    </a> -->
                </div>

            </div>
        </div>
    </div>
    <div class="main-block">
        <form action="donorregister" method="post" enctype="multipart/form-data">
            @csrf

            <fieldset>
                <legend>
                    <h3>Fill This Form To Register For Donate Blood</h3>
                </legend>
                <div class="account-details">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                    <div><label>First Name</label><input type="text" name="firstname" value="" required></div>
                    <div><label>Phone</label><input type="text" name="phone" required></div>
                    <div><label>Last name</label><input type="text" name="lastname" required></div>
                    <div><label>Weignt</label><input type="text" name="weight" required></div>
                    <div><label>Email</label><input type="text" name="email" value="" required></div>
                    <div><label>Birth Date</label><input type="date" name="birthdate" required></div>
                    <div><label>Image</label><input type="file" name="photo" required></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Fill This Form</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div><label>State</label><input type="text" name="state" required></div>
                        <div><label>City</label><input type="text" name="city" required></div>
                        <div>
                            <label>Blood Group</label>
                            <select name="bloodtype" required>
                                <option value="">choose blood type</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O+</option>
                            </select>
                        </div>

                        <div>
                            <label>Health Status</label>
                            <select name="healthstatus" required>
                                <option value="Felege">Normal</option>
                                <option value="adama">Have HIV</option>
                                <option value="fhkhfz">Have Hepataitus</option>
                            </select>
                        </div>
                        <div>
                            <label>Gender*</label>
                            <div class="gender">
                                <select name="gender" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>

                                </select>
                            </div>
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
</body>

</html>
@endsection