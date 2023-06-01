<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Donor Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        .phone-input {
            display: flex;
            align-items: center;
            width: 400px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow: hidden;
        }

        .phone-input .country-code {
            padding: 5px;
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .phone-input .separator {
            margin: 0 10px;
        }

        .phone-input input {
            flex: 1;
            border: none;
            padding: 5px;
            outline: none;
        }



        header {
            height: 90px;
            background: #245953;
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
            padding: 0 20px 0 0;
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

        /* card style */
        .card-container {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 10px;
        }

        .card-title {
            margin-bottom: 20px;
            text-align: center;
        }

        .card-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-column {
            flex: 1;
            max-width: 300px;
            margin: 10px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .card-heading {
            margin-top: 0;
        }

        .card-content {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            .card-row {
                flex-direction: column;
                align-items: center;
            }
        }

        .error-message {
            display: none;
            color: red;
        }
    </style>

    <script>
        function validateName(name) {
            var letterRegex = /^[a-zA-Z]+$/;
            return letterRegex.test(name);
        }

        function validateInput() {
            var password = document.getElementById("passwordField").value;
            var confirmPass = document.getElementById("confirmPasswordField").value;
            var fileInput = document.getElementById("fileInput");
            var firstName = document.getElementById("firstNameField").value;
            var lastName = document.getElementById("lastNameField").value;

            // Check first name validation
            if (!validateName(firstName)) {
                document.getElementById("errorFirstName").style.display = "block";
            } else {
                document.getElementById("errorFirstName").style.display = "none";
            }

            // Check last name validation
            if (!validateName(lastName)) {
                document.getElementById("errorLastName").style.display = "block";
            } else {
                document.getElementById("errorLastName").style.display = "none";
            }

            // Check password validations
            if (password.length < 8) {
                document.getElementById("errorLength").style.display = "block";
            } else {
                document.getElementById("errorLength").style.display = "none";
            }

            var lowercaseRegex = /[a-z]/;
            if (!lowercaseRegex.test(password)) {
                document.getElementById("errorLowercase").style.display = "block";
            } else {
                document.getElementById("errorLowercase").style.display = "none";
            }

            var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
            if (!specialCharRegex.test(password)) {
                document.getElementById("errorSpecialChar").style.display = "block";
            } else {
                document.getElementById("errorSpecialChar").style.display = "none";
            }

            var numberRegex = /\d/;
            if (!numberRegex.test(password)) {
                document.getElementById("errorNumber").style.display = "block";
            } else {
                document.getElementById("errorNumber").style.display = "none";
            }
            // Check password confirmation
            if (password !== confirmPass) {
                document.getElementById("errorConfirm").style.display = "block";
            } else {
                document.getElementById("errorConfirm").style.display = "none";
            }


            // Check file size
            if (fileInput.files.length > 0) {
                var fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 10) {
                    document.getElementById("errorFileSize").style.display = "block";
                } else {
                    document.getElementById("errorFileSize").style.display = "none";
                }
            }

            // Check file format
            var allowedFormats = ["jpeg", "jpg", "png", "gif", "bmp", "svg"];
            var fileFormat = fileInput.value.split('.').pop().toLowerCase();
            if (!allowedFormats.includes(fileFormat)) {
                document.getElementById("errorFileFormat").style.display = "block";
            } else {
                document.getElementById("errorFileFormat").style.display = "none";
            }


        }

        function validateForm(event) {
            event.preventDefault(); // Prevent default form submission

            // Perform final validation and show error messages
            var password = document.getElementById("passwordField").value;
            var confirmPass = document.getElementById("confirmPasswordField").value;
            var fileInput = document.getElementById("fileInput");

            // Check first name validation
            var firstName = document.getElementById("firstNameField").value;
            if (!validateName(firstName)) {
                document.getElementById("errorFirstName").style.display = "block";
            } else {
                document.getElementById("errorFirstName").style.display = "none";
            }

            // Check last name validation
            var lastName = document.getElementById("lastNameField").value;
            if (!validateName(lastName)) {
                document.getElementById("errorLastName").style.display = "block";
            } else {
                document.getElementById("errorLastName").style.display = "none";
            }

            // Check password validations
            if (password.length < 8) {
                alert("Password must be 8 characters or longer.");
                return false;
            }

            var lowercaseRegex = /[a-z]/;
            if (!lowercaseRegex.test(password)) {
                alert("Password must contain at least one lowercase letter.");
                return false;
            }

            var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
            if (!specialCharRegex.test(password)) {
                alert("Password must contain at least one special character.");
                return false;
            }

            var numberRegex = /\d/;
            if (!numberRegex.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }

            // Check password confirmation
            if (password !== confirmPass) {
                alert("Password confirmation does not match.");
                return false;
            }

            // Check file size
            if (fileInput.files.length > 0) {
                var fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 10) {
                    alert("File size must be 10 MB or smaller.");
                    return false;
                }
            }

            // Check file format
            var allowedFormats = ["jpeg", "jpg", "png", "gif", "bmp", "svg"];
            var fileFormat = fileInput.value.split('.').pop().toLowerCase();
            if (!allowedFormats.includes(fileFormat)) {
                alert("Only JPEG, JPG, PNG, GIF, BMP, and SVG file formats are allowed.");
                return false;
            }

            // If all validations pass, you can proceed with further actions if needed
            event.target.submit();
            //  return true; // Prevent form submission and page refresh
        }
    </script>
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

    <div class="card-container" style="margin-top: 70px;">
        <h2 class="card-title">Bahir Dar Blood Bank</h2>
        <div class="card-row">
            <div class="card-column">
                <div class="card">
                    <h3 class="card-headheadinging"> <!--Join Our Blood Bank Community and Help Save Lives --> የእኛን የደም ባንክ ይቀላቀሉ ህይወትን ለማዳን ያግዙ</h3>
                    <p class="card-content" style="font-size: large;">
                        የደም ባንክ ማህበረሰባችን አባል በመሆን፣ ህይወትን ለማዳን የሚተጉ ለጋሾች ቡድን አባል ይሆናሉ። የእርስዎ ልገሳ ለተቸገሩ ታካሚዎች ወሳኝ ለውጥ ያመጣል፣ ዛሬ ይቀላቀሉን እና ለተቸገረ ሰው ይድረሱ ።<br>
                        አባሎቻችንን እናከብራለን እናም ህይወትን ለማዳን ላደረጉት ቁርጠኝነት ያለንን አድናቆት ማሳየት እንፈልጋለን
                    </p>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">አባል ይሁኑ ልዩ ልዩ ጥቅማጥቅሞችን ያግኛሉ</h3>
                    <p class="card-content" style="font-size: large;">
                        <!-- "Join our blood bank community today and help save lives! By creating an account, you'll have access to our life-saving blood donation program, where you can easily schedule appointments, track your donations, and receive alerts when your blood type is needed. Plus, as a member, you'll receive exclusive perks like priority donation appointments, special promotions, and more. Sign up now and start making a difference in your community!" -->
                        "አካውንት በመፍጠር ህይወት አድን የደም ልገሳ ፕሮግራማችንን በቀላሉ ቀጠሮ መያዝ፣ መዋጮዎትን መከታተል እና የደም አይነትዎ ሲከሰት ማንቂያዎችን ማግኘት ይችላሉ። ያስፈልጋል። በተጨማሪም፣ አባል እንደመሆኖ፣ እንደ የቅድሚያ የልገሳ ቀጠሮዎች፣ ልዩ ማስተዋወቂያዎች እና ሌሎች የመሳሰሉ ልዩ ጥቅማጥቅሞችን ያገኛሉ። አሁኑኑ ይመዝገቡ እና በማህበረሰብዎ ላይ ለውጥ ማምጣት ይጀምሩ!"
                    </p>
                </div>
            </div>

        </div>
    </div>


    <div class="main-block mt-6 ml-5" style="margin-top: 50px;">


        <form action="{{ route('create_acc') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm(event)">

            @csrf
            <h1>Create Account</h1>
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
                    <div>
                        <!-- <label>First Name</label>
                        <input type="text" name="firstname" value=""> -->
                        <label for="firstNameField">First name:</label>
                        <input type="text" id="firstNameField" name="firstname" onkeyup="validateInput()">

                        <div id="errorFirstName" class="error-message">First name must contain only letters.</div>
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
                    <div>
                        <!-- <label>Last Name</label>
                        <input type="text" name="lastname" value=""> -->

                        <label for="lastNameField">Last name:</label>
                        <input type="text" id="lastNameField" name="lastname" onkeyup="validateInput()">
                        <div id="errorLastName" class="error-message">Last name must contain only letters.</div>

                        <div style="color: red;">
                            @error('lastname')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <!-- <label>Password</label> -->
                        <label for="passwordField">Enter password:</label>
                        <!-- <input type="password" name="password" value=""> -->
                        <input type="password" id="passwordField" name="password" onkeyup="validateInput()">
                        <br>
                        <div id="errorLength" class="error-message">Password must be 8 characters or longer.</div>
                        <div id="errorLowercase" class="error-message">Password must contain at least one lowercase letter.</div>
                        <div id="errorSpecialChar" class="error-message">Password must contain at least one special character.</div>
                        <div id="errorNumber" class="error-message">Password must contain at least one number.</div>

                        <div style="color: red;">
                            @error('password')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div><label>Age</label><input type="number" name="age" value="">
                        <!-- <input type="date" name="date" min="{{ date('Y-m-d') }}"> -->
                        <div style="color: red;">
                            @error('age')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <!--  <label>Confirm Password</label>
                     <input type="password" name="password_confirmation" /> -->
                        <label for="confirmPasswordField">Confirm password:</label>
                        <input type="password" id="confirmPasswordField" name="password_confirmation" onkeyup="validateInput()">
                        <br>
                        <div id="errorConfirm" class="error-message">Password confirmation does not match.</div>
                    </div>

                    <div><label>Occupation</label><input type="text" name="occupation" value="">
                        <div style="color: red;">
                            @error('occupation')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>phone</label>
                        <div class="phone-input">
                            <span class="country-code">+251</span>
                            <span class="separator">|</span>
                            <input type="text" name="phone" placeholder="Phone Number">
                        </div>

                        <div style="color: red;">
                            @error('phone')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <!-- <label>Image</label>
                        <input type="file" accept="image/png/jpeg/svg/jpg" name="photo"> -->

                        <label for="fileInput">Upload Image:</label>
                        <input type="file" id="fileInput" name="photo" onchange="validateInput()">

                        <div id="errorFileSize" class="error-message">File size must be 10 MB or smaller.</div>
                        <div id="errorFileFormat" class="error-message">Only JPEG, JPG, PNG, GIF, BMP, and SVG file formats are allowed.</div>
                        <div style="color: red;">
                            @error('photo')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="gender"><label>Gender</label>
                        <label for="male">male</label>
                        <input type="radio" id="male" name="gender" value="male">

                        <label for="female">female</label>
                        <input type="radio" id="female" name="gender" value="female">
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
                        <div><label>Country</label><input type="text" name="country" value="Ethiopia" readonly>
                            <div style="color: red;">
                                @error('country')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>State</label><input type="text" name="state">
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
                        <div><label>House Number</label><input type="text" name="housenumber" pattern="\d{5}">

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
                        <div><label>Height</label><input type="number" name="height" min="1.50" max="2.10" step="0.01">

                            <div style="color: red;">
                                @error('height')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Weight</label><input type="number" name="weight" value="">
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