@extends('healthinstitute.sidebar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>Doctor Add Form</title>
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #gender {
            padding: 10px;
        }

        select {
            padding: 10px;
        }

        .submit-button {
            background-color: #19376D;
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
            background-color: #000000;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="form-container">
            <h1>Post Seeker Form</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="post_seeker" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hospital_id" value="{{Auth::user()->id}}">
                <div class="form-grid">
                    <div>
                        <label for="firstname"> First Name:</label>
                        <input type="text" id="" name="firstname">
                        <p style="color: red;">
                            @error('firstname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">
                        <div style="color: red;">
                            @error('email')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for=""> Last Name:</label>
                        <input type="text" id="" name="lastname">
                        <div style="color: red;">
                            @error('lastname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="date">when is need:</label>
                        <input type="date" id="" name="when_nedded" min="{{ date('Y-m-d') }}">
                        <div style="color: red;">
                            @error('date')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="phone">Phone:</label>
                        <input type="number" id="" name="phone">
                        <div style="color: red;">
                            @error('phone')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="">Age:</label>
                        <input type="text" id="" name="age">
                    </div>
                    <div>
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="">Select</option>
                            <option value="male">female</option>
                            <option value="female">male</option>
                        </select>
                        <div style="color: red;">
                            @error('gender')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label>Blood Group</label>
                        <select name="bloodtype" required>
                            <option value="">Choose Blood Type</A></option>
                            <option value="A+">A+</A></option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div>
                        <label for="photo">Photo:</label>
                        <input type="file" id="" name="photo">
                        <div style="color: red;">
                            @error('photo')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label>For What Purpose Do You Want</label>
                        <textarea id="w3review" name="purpose" rows="5" cols="30"></textarea>
                    </div>
                </div>

                <button type="submit" class="submit-button">Post</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- @include('sweetalert::alert') -->
</body>

</html>
@endsection