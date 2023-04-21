@extends('nurse.side_bar')
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
    <div style="margin-top:60px; margin-left:150px;">
        <!-- <a href="{{url('/nurse/listofdonor')}}" style="text-decoration:none;">Are you Donate Before?</a> -->

        <form action="{{url('/nurse/search_donor')}}" method="post">
            @csrf
            <div style="float:right; margin-right:60px;">
                <input type="text" name="fullname" style="width: 200px;" placeholder="enter name.email,phone" required>
                <input type="submit" value="Search" class="btn btn-primary" style="width: 70px;">
            </div>
        </form>
    </div>
    <br> <br>
    <div class="container mt-5">

        <div class="form-container">
            <h1>Donor Enrollment Form</h1>
            <form action="{{url('/nurse/enrolldonor')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div><input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required></div>
                <div class="form-grid">
                    <div>
                        <label for="last_name">First Name:</label>
                        <input type="text" id="first_name" name="firstname" required>
                    </div>
                    <div>
                        <label for="first_name">Last Name:</label>
                        <input type="text" id="last_name" name="lastname" required>
                    </div>

                    <div>
                        <label for="last_name">Phone:</label>
                        <input type="text" id="" name="phone" required>
                    </div>
                    <div>
                        <label for="first_name">Email:</label>
                        <input type="text" id="first_name" name="email" required>
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
                        <label for="first_name">Photo:</label>
                        <input type="file" id="first_name" name="photo" required>
                    </div>
                    <div>
                        <label for="last_name">Pack No:</label>
                        <input type="text" id="last_name" name="packno" required>
                    </div>
                </div>
                <div style="color: red;">
                    <hr>
                </div>
                <div class="form-grid">

                    <div>
                        <label for="first_name">Blood Type:</label>
                        <input type="text" id="first_name" name="bloodtype" required>
                    </div>
                    <div>
                        <label for="last_name">Volume:</label>
                        <input type="text" id="last_name" name="volume" required>
                    </div>
                    <div>
                        <label for="first_name">Country:</label>
                        <select class="form-control" id="gender" name="country">
                            <option value="">Select your Country</option>
                            <option value="male">Ethiopia</option>
                            <option value="female">Erthria</option>
                            <option value="other">Sudan</option>
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
                    <div>alm@gmail.com
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
                        <label for="last_name">Type Of Donation:</label>
                        <input type="text" id="last_name" name="typeofdonation" value="Volontary" readonly required>
                    </div>
                    <div>
                        <label for="last_name">Remark:</label>
                        <textarea id="w3review" name="remark" rows="5" cols="30"></textarea>
                    </div>
                </div>

                <button type="submit" class="submit-button">Enroll</button>
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