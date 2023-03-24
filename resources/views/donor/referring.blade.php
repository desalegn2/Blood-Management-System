@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .input-group {
            margin-right: 5px;
            background-color: black;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid rgb(70, 68, 68);
            border-radius: 4px;
            resize: vertical;
        }

        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid rgb(70, 68, 68);
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: rgb(37, 116, 161);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        .copy-cont {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            /* padding: 20px; */
            background-color: #6D67E4;
            max-width: 800px;
             /* margin: 0 auto; */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #009EFF;
            padding: 10px;
        }

        #copy-link {
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }

        .t {
            color: #F7F7F7;
            margin: 0;
        }

        p {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2>Referral Program</h2>
        <div class="copy-cont">
            <div class="header">
                <p class="t">Referral Link</p>
                <a href="{{ url('create_account_r',Auth::user()->referral_code) }}" id="copy-link"><i class="far fa-copy"></i>Copy</a>

            </div>
            <p style="color: white;">This is Your Referrel Link copy it and share to you friend,families and relatives to donate blood </p>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Number of Referral You Made</label>
            </div>
            <div class="col-75">
                <label for="fname">{{$num_referred}}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="fname">Your Incentives</label>
            </div>
            <div class="col-75">
                <label for="fname">Pending...</label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">list of Referred Donor</label>
            </div>
            <div class="col-75">
                <table>
                    <tr>
                        <th>User Name </th>
                        <th>User Email </th>
                        <th>Status </th>
                    </tr>
                    @foreach($list_referred as $referral)
                    <tr>
                        <td>{{$referral->referredUser->name}}</td>
                        <td>{{$referral->referredUser->email}}</td>
                        <td>{{$referral->status}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('copy-link').addEventListener('click', function(event) {
            event.preventDefault();
            var link = this.getAttribute('href');
            navigator.clipboard.writeText(link);
            alert('You copied the link!');
        });
        button

        function copyText() {
            var copyText = document.getElementById("copy-input");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
</body>

</html>
@endsection