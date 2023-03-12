@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>Donor Enrollment Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style for the form container */
        .form-container {

            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style for the form grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        /* Style for the form label */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        /* Style for the form input */
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        /* Style for the submit button */
        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .submit-button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <!-- To be eligible to donate blood, an individual must meet certain health criteria. The general requirements may vary slightly depending on the country or region, but the following are some common criteria:

1.Age: The minimum age for blood donation is usually 17 or 18 years, but it can be higher in some countries. The upper age limit may also vary, but it is generally around 65 years.

2.Weight: Donors must weigh at least 50 kg (110 pounds) to ensure that they have enough blood volume to donate.

3.Health: Donors should be in good health, without any acute illnesses or infections. Chronic conditions, such as high blood pressure or diabetes, may not necessarily disqualify a donor, but they will be evaluated on a case-by-case basis.

4.Medications: Some medications may affect blood donation eligibility. Donors should inform the staff if they are taking any prescription or over-the-counter medications.

5.Travel history: Donors who have recently traveled to certain countries or regions may be deferred for a certain period of time due to the risk of acquiring infectious diseases.

6.Lifestyle choices: Donors who engage in high-risk behaviors, such as intravenous drug use or unprotected sex, may be deferred for a certain period of time due to the risk of transmitting infectious diseases. -->
    <div class="container mt-5">

        <div class="form-container">
            <h1>Send Reservation to Donate</h1>
            <form action=" {{url('/donor/reservation')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div><input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required></div>
                <div class="form-grid">
                    <div>
                        <label for="last_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div>
                        <label for="first_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>

                    <div>
                        <label for="last_name">Phone:</label>
                        <input type="text" id="" name="phone" required>
                    </div>
                    <div>
                        <label for="first_name">Email:</label>
                        <input type="text" id="first_name" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div>
                        <label for="last_name">gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select your gender</option>
                            <option value="male">female</option>
                            <option value="female">male</option>
                        </select>
                    </div>
                    <div>
                        <label for="first_name">Age:</label>
                        <input type="text" id="first_name" name="age" required>
                    </div>
                    <div>
                        <label for="last_name">Weight:</label>
                        <input type="text" id="last_name" name="weight" required>
                    </div>
                    <div>
                        <label for="first_name">Height:</label>
                        <input type="text" id="first_name" name="height" required>
                    </div>
                    <div>
                        <label for="last_name">Occupation:</label>
                        <input type="text" id="last_name" name="occupation" required>
                    </div>
                    <div>
                        <label for="">Health Status:</label><br>
                        <select name="health" required>
                            <option value="">Choose health status</option>
                            <option value="normal">Normal</option>
                            <option value="haveHIV">Have HIV</option>
                            <option value="kenya">Kenya</option>
                            <option value="sudan">Sudan</option>
                        </select>
                    </div>

                </div>
                <div style="color: red;">
                    <hr>
                </div>
                <div class="form-grid">

                    <div>
                        <label for="first_name">Blood Type:</label><br>
                        <select name="bloodtype" required>
                            <option value="">choose blood type</option>
                            <option value="A+">unkown</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>


                    <div>
                        <label for="">Country:</label><br>
                        <select name="country" required>
                            <option value="">Choose country</option>
                            <option value="ethiopia">Ethiopia</option>
                            <option value="erthria">Erthria</option>
                            <option value="kenya">Kenya</option>
                            <option value="sudan">Sudan</option>
                        </select>
                    </div>

                    <div>
                        <label for="last_name">State:</label>
                        <input type="text" id="last_name" name="state" required>
                    </div>
                    <div>
                        <label for="first_name">City:</label>
                        <input type="text" id="first_name" name="city" required>
                    </div>
                    <div>
                        <label for="last_name">Zone:</label>
                        <input type="text" id="last_name" name="zone" required>
                    </div>
                    <div>
                        <label for="first_name">Woreda:</label>
                        <input type="text" id="first_name" name="woreda" required>
                    </div>
                    <div>
                        <label for="last_name">Kebelie:</label>
                        <input type="text" id="last_name" name="kebelie" required>
                    </div>
                    <div>
                        <label for="last_name">House Number:</label>
                        <input type="text" id="last_name" name="housenumber" required>
                    </div>

                    <div>
                        <label for="last_name">Center:</label><br>
                        <select name="center" required>
                            <option value="">Choose Hospital</option>
                            @foreach($data as $dat)
                            <option value="{{$dat->name}}">{{$dat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="last_name">Donation Date:</label>
                        <input type="date" id="last_name" name="reservationdate" required>
                    </div>

                </div>
                <button type="submit" class="submit-button">Send</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('sweetalert::alert')
</body>

</html>
@endsection