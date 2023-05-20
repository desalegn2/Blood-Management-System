@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        .list {
            font-size: large;
        }

        .container {
            display: flex;
            
             justify-content: space-between;
            
            border-top: 1px solid black;
            /* Add a 2px black border to the top of the container */
            padding-top: 20px;
            /* Add some padding to the top of the container to separate the border from the content */
            margin-top: 100px;
            left: 0;

        }

        h1 {
            flex-basis: 30%;
            font-size: 24px;
            margin-right: 20px;
        }

        p {
            flex-basis: 60%;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 0;
        }
        table tr th{

            width: 100%;
            left: 0;
        }
     

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }

            h1 {
                margin-bottom: 10px;
            }
        }
    </style>

</head>

<body>

    <div class="containers mt-5">

        <div class="container">
            <h4>Referral Link</h4>
            <a href="{{ url('create_account_r',$referral_code) }}" id="copy-link"><i class="far fa-copy"></i>Copy</a>
            <br>
            <p>This is Your Referrel Link copy it and share to you friend,families and relatives to donate blood </p>
        </div>

        <div class="container">
            <h6>Number of Referral You Made</h6>
            <label>{{$num_referred}}</label>
        </div>

        <div class="container">
            <h6>list of Referred Donor</h6>
            <table>
                <thead>
                    <tr>
                        <th>First Name </th>

                        <th>Last Name </th>
                        <th> phone </th>

                        <th>Status </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_referred as $referral)
                    <tr>
                        <td>{{$referral->referredDonor->firstname}}</td>
                        <td>{{$referral->referredDonor->lastname}}</td>
                        <td>{{$referral->referredDonor->phone}}</td>
                        <td>{{$referral->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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