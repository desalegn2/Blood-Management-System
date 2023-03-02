<!DOCTYPE html>
<html>

<head>
    <title>Weekly Blood Distribution Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- <img src="{{asset('assets/imgs/bblogo3.png')}}" alt="Company Logo" class="company-logo"> -->
                </div>
                <div class="col-md-6">
                    <h1 class="company-name">BAHIR DAR BLOOD BANK</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h3> Blood Distribution Report To Hospitals</h3>
                <p>Date Of Report {{$startDate}}</p>

                <p>We successfully distributed blood from our blood bank to these health institute. We take pride in ensuring the safety and efficacy of our blood products and strive to provide the highest level of service to our customers.</p>
                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Reciever</th>
                            <th>Blood Type</th>
                            <th>Volume</th>
                            <th>Expiration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data))
                        @foreach($data as $member)
                        <tr>
                            <td>{{$member->recievedby}}</td>
                            <td>{{$member->bloodgroup}}</td>
                            <td>{{$member->volume}}</td>
                            <td>{{$member->expirydate}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Data Not Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <p>The proper distribution of blood products is critical to ensuring that patients receive safe and effective transfusions. Blood banks, transportation companies, and healthcare facilities must work together to ensure that the blood products are handled and transported properly at all times.</p>
                <br> <br> <br> <br>
                <p>Bahir Dar Blood Bank Representative<br>
                    {{ Auth::user()->name }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>