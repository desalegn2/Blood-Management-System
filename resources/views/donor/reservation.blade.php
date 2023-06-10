@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>Donor Enrollment Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {

            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit);
            grid-gap: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #3F497F;
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

        #text-danger {
            color: red;
            background-color: #F6F1F1;
            border-color: #000000;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
            font-weight: lighter;
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
            @if ($errors->has('health'))
            <span class="text-danger">
                <strong>ህይወትን ለማዳን ደም ለመለገስ ላሳዩት ፍላጎት እና ቁርጠኝነት እናመሰግናለን። <br>
                    ነገር ግን ተላላፊ በሽታ ካለባቸዉ ግለሰቦች የደም ልገሳን መቀበል አንችልም <br>
                    ምክንያቱም ለለጋሹም ሆነ ለተቀባዩ አደጋ ያስከትላል. <br>
                    የደም ልገ ሳን አስፈላጊነት ግንዛቤ በማስጨበጥ እና ሌሎችም እንዲለግሱ
                    በማበረታታት የዓላማችንን ድጋፍ እንድትቀጥሉ እናሳስባለን። </strong>
            </span>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action=" {{url('/donor/reservation')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div><input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required></div>
                <div class="form-grid">

                    <div>
                        <label for="health">Health Status:</label><br>
                        <select name="health">
                            <option value="">Choose health status</option>
                            <option value="normal">Normal</option>
                            <option value="Idon'tknow">I don't Know</option>
                            <option value="hiv">Have HIV</option>
                            <option value="hepatite">Have Hepatitis</option>
                        </select>
                    </div>
                    <div>
                        <label for="center">Center:</label><br>
                        <select name="center">
                            <option value="">Choose Hospital</option>
                            @foreach($data as $dat)
                            <option value="{{$dat->centor_name}}">{{$dat->centor_name}}</option>
                            @endforeach
                        </select>

                        <div style="color: red;">
                            @error('center')
                            <strong>Center አልመረጡም</strong>
                            @enderror
                        </div>
                    </div>
                    
                    <input type="hidden" name="lastDonationDate" value="{{$lastDonationDate}}">
                    <div>
                        <label for="reservationdate">Donation Date:</label>
                        <input type="date" id="reservationdate" name="reservationdate" min="{{ date('Y-m-d') }}">
                        <div style="color: red;">
                            @error('reservationdate')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
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