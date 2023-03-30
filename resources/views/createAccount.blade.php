<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Donor Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        header {
            height: 90px;
            background: #FF7B54;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
        }

        .inner-width {
            max-width: 1000px;
            padding: 0 10px;
            margin: auto;
        }

        .navigation-menu {
            float: right;
            display: flex;
            align-items: center;
            min-height: 90px;

        }

        .navigation-menu a {
            margin-left: 10px;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            padding: 12px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: .3s linear;

        }

        .navigation-menu a:hover {
            color: #fff;
            transform: scale(1.1);
        }

        .navigation-menu i {
            margin-right: 8px;
            font-size: 16px;
        }

        .home {
            color: #fff;
        }

        a.aj_btn {
            background: #273b91;
            color: #fff;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .menu-toggle-btn {
            float: right;
            height: 90px;
            line-height: 90px !important;
            color: #fff;
            font-size: 26px;
            display: none !important;
            cursor: pointer;
        }


        @media screen and (max-width:900px) {
            .menu-toggle-btn {
                display: block !important;

            }

            .navigation-menu {
                position: fixed;

                width: 100%;
                max-width: 400px;
                background: #172b4d;
                top: 90px;
                right: 0;
                display: none;
                padding: 20px 40px;
                box-sizing: border-box;
                z-index: 99;

            }

            .navigation-menu::before {
                content: "";
                border-left: 10px solid transparent;
                border-right: 10px solid transparent;
                border-bottom: 10px solid #172b4d;
                position: absolute;
                top: -10px;
                right: 10px;
            }

            .navigation-menu a {
                display: block;
                margin: 1px 0;


            }

            .navigation-menu.active {
                display: block;
            }
        }

        /* create account */
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
            padding: 10px 10px 10px 10px;
            text-align: right;
            vertical-align: middle;
        }

        input {
            padding: 10px;
            align-items: left;
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
            padding: 7px 0;
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
            width: 10%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #19376D;
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

    <div>

        <header>

            <div class="inner-width">

                <i class="menu-toggle-btn fas fa-bars"></i>
                <nav class="navigation-menu">
                    <a href="/">Home</a>
                    <a href="{{ route('login') }}">Login</a>
                </nav>
            </div>
        </header>

    </div>
    <br><br>

    <div class="main-block mt-6 ml-5" style="margin-top: 50px;">

        <form action="create_acc" method="post" enctype=" multipart/form-data">
            @csrf
            <h1>Blood Donor Enrollment Form</h1>

            <fieldset>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <legend>
                    <h3>Donor Information</h3>
                </legend>
                <input type="hidden" name="role" value="2" required>
                <div class="account-details">
                    <div><label>First Name</label><input type="text" name="firstname" value="">
                        <div style="color: red;">
                            @error('firstname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Email</label><input type="text" name="email" value="">
                        <div style="color: red;">
                            @error('email')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Last Name</label><input type="text" name="lastname" value="">
                        <div style="color: red;">
                            @error('lastname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Password</label><input type="password" name="password" value="">
                        <div style="color: red;">
                            @error('password')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Age</label><input type="number" name="age" value="">
                        <div style="color: red;">
                            @error('age')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Confirm Password</label> <input type="password" name="password_confirmation" /></div>
                    <div><label>Occupation</label><input type="text" name="occupation" value="">
                        <div style="color: red;">
                            @error('occupation')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>phone</label><input type="text" name="phone" value="">
                        <div style="color: red;">
                            @error('phone')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Image</label><input type="file" name="photo">
                        <div style="color: red;">
                            @error('photo')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>Gender</label><input type="text" name="gender" value="">
                        <div style="color: red;">
                            @error('gender')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Contact Information</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div><label>Country</label><input type="text" name="country" value="">
                            <div style="color: red;">
                                @error('country')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>State</label><input type="text" name="state" value="">
                            <div style="color: red;">
                                @error('state')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>City</label><input type="text" name="city" value="">
                            <div style="color: red;">
                                @error('city')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Zone</label><input type="text" name="zone" value="">
                            <div style="color: red;">
                                @error('zone')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Woreda</label><input type="text" name="woreda" value="">
                            <div style="color: red;">
                                @error('woreda')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Kebele</label><input type="text" name="kebelie" value="">
                            <div style="color: red;">
                                @error('kebelie')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>House Number</label><input type="text" name="housenumber" value="">
                            <div style="color: red;">
                                @error('housenumber')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Blood Group</label>
                            <select name="bloodtype">
                                <option value="">choose</option>
                                <option value="unknown">I don't Know</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <div style="color: red;">
                                @error('bloodtype')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Type of Donation</label><input type="text" name="typeofdonation" value="vountary" readonly></div>
                        <div><label>Height</label><input type="text" name="height" value="">
                            <div style="color: red;">
                                @error('height')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Weight</label><input type="text" name="weight" value="">
                            <div style="color: red;">
                                @error('weight')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <center> <button type="submit">Registaer</button></center>
        </form>
    </div>
    <script>
        $(".menu-toggle-btn").click(function() {
            $(this).toggleClass("fa-times");
            $(".navigation-menu").toggleClass("active");
        });
    </script>
</body>

</html>