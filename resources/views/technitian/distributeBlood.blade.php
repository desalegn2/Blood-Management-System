@extends('technitian.sidebar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>
        Reset button in HTML
    </title>
    <style>
        .form-data {
            border: #81D4FA 2px solid;
            background-color: #03a9f400;
            text-align: left;
            padding-left: 20px;
            height: 600px;
            width: 95%;
        }

        .form {
            margin: 5px auto;
            max-width: 700px;
            padding: 25px 15px 15px 25px;
        }

        .form li {
            margin: 12px 0 0 0;
            list-style: none;
        }

        .form label {
            margin: 0 0 3px 0;
            padding: 0px;
            display: block;
            font-weight: bold;
        }

        .form .field {
            width: 80%;
            height: 20px;
        }

        .form input[ type=submit],
        .form input[ type=reset] {
            background: #2196F3;
            padding: 10px 17px 10px 17px;
            margin-right: 10px;
            color: #fff;
            border: none;
        }

        .form input[type=submit]:hover,
        .form input[ type=reset]:hover {
            background: #2173f3;
        }

        .heading {
            font-weight: bold;
            border-bottom: 5px solid #ddd;
            font-size: 15px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="form-data">
        <div class="heading">
            <h2> Discard Blood Registry </h2>
            <a type="reset" href="home">Back</a>
        </div>
        <div>
            <form action="savedistribute" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="field" />
                <ul class="form">
                    <li>
                        <label> Blood Group <span class="required"> </span></label>
                        <select name="bloodtype" class="field">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O+</option>
                        </select>
                    </li>
                    <li>
                        <label>Unit Issued <span class="required"></span></label>
                        <input type="text" name="volume" placeholder=" Unit Discarded" class="field" />
                    </li>
                    <li>
                        <label> Issued Date <span class="required"> </span></label>
                        <input type="date" name="issuedate" class="field" />
                    </li>
                    <li>
                        <label> Expiry Date <span class="required"> </span></label>
                        <input type="date" name="expirydate" class="field" />
                    </li>

                    <li>
                        <label> Recieved By </label>
                        <input type="text" name="centerid" placeholder=" Center Id" class="field" />
                    </li>
                    <li>
                        <input type="submit" value="Save" />
                        <input type="reset" value="Reset">

                    </li>
                </ul>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
    <script type="text/javascript">
    </script>
</body>

</html>
@endsection