@extends('healthinstitute.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- ======= Styles ====== -->

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

    <div class="main-block">
        <form action="post" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Blood Request Form</h1>
            <fieldset>
                <legend>
                    <h3>Fill This Form</h3>
                </legend>
                <div class="account-details">

                    <div><label>First Name</label><input type="text" name="fname" required></div>
                    <div><label>When You Need</label><input type="date" name="whenneed" required></div>
                    <div><label>Last name</label><input type="text" name="lname" required></div>
                    <div><label>State</label><input type="text" name="state" required></div>

                    <div><label>Email</label><input type="text" name="email" required>
                        <div style="color: red;">
                            @error('email')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><label>City</label><input type="text" name="city" required></div>
                    <div>

                        <label>Image</label><input type="file" name="photo" required>
                        <div style="color: red;">
                            @error('photo')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div><input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Fill This Form</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div>
                            <label>Gender</label>
                            <select name="gender">
                                <option value="male">male</option>
                                <option value="female">female</option>

                            </select>
                        </div>
                        <div><label>Age</label><input type="number" name="age" required>
                            <div style="color: red;">
                                @error('age')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div><label>Phone</label><input type="text" name="phone" required>
                            <div style="color: red;">
                                @error('phone')
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
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O+</option>
                            </select>
                        </div>
                        <div><label>How Many Unit You Need</label><input type="text" name="amount"></div>
                        <div>
                            <label>Which Hospital do you Want to Get Blood</label>
                            <select name="hospital">
                                <option value="Felege">Felege</option>
                                <option value="adama">adama</option>
                                <option value="fhkhfz">fhkhfz</option>
                                <option value="uyuiay">uyuiay</option>
                                <option value="ljakdaHS">ljakdaHS</option>
                                <option value="buyai">buyai</option>
                                <option value="tiytat">tiytat</option>
                            </select>
                        </div>
                    </div>
                    <div>

                        <div>

                            <label>For What Purpose Do You Want</label>
                            <textarea id="w3review" name="purpose" rows="5" cols="30"></textarea>
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
                        <input type="checkbox" name=""><span>I accept the <a href="https://www.w3docs.com/privacy-policy">Privacy Policy for W3Docs.</a></span>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name=""><span>I want to recelve personallzed offers by your site</span>
                    </div>
            </fieldset>
            <button type="submit" href="">Submit</button>
        </form>
    </div>

    @include('sweetalert::alert')
</body>

</html>
@endsection