@extends('admin.sidebar')
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
            margin-top: 50px;
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
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        select {
            padding: 10px;
        }

        /* Style for the submit button */
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
            <h1>Add Blood Bank Staff</h1>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="add" method="post" enctype="multipart/form-data">
                @csrf
                <div><input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required></div>
                <div class="form-grid">
                    <div>
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname">
                        <p style="color: red;">
                            @error('firstname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>

                    <div>
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="last_name" name="lastname" required>
                        <div style="color: red;">
                            @error('lastname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" required>
                        <div style="color: red;">
                            @error('phone')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <div style="color: red;">
                            @error('email')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <div style="color: red;">
                            @error('password')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
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
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div>
                        <label for="role">Staff Type:</label>
                        <select class="form-control" id="role" name="role">
                            <option value="">Select</option>
                            <option value="3">Nurse</option>
                            <option value="4">Technician</option>
                            <option value="0">Manager</option>
                        </select>
                        <div style="color: red;">
                            @error('role')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>


                <button type="submit" class="submit-button">Register</button>
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