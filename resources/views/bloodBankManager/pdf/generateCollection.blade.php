<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 6px;
            }
        }

        .company-logo {
            display: block;
            margin: auto;
            max-width: 200px;
            padding: 10px;
        }

        .company-name {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
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
    <main class="container my-4">
        <h2>Blood Collection Report</h2>
        <p>Date: {{$mytime}}</p>
        <p>Time period: From{{$startDate}} To {{$endDate}}

        </p>
        <p>Total amount collected:{{$total}} ml </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Date of Donation</th>
                    <th>Blood Type</th>
                    <th>Amount Collected (mL)</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data))
                @foreach($data as $member)
                <tr>

                    <td>{{$member->fullname}}</td>
                    <td>{{$member->created_at}}</td>
                    <td>{{$member->bloodtype}}</td>
                    <td>{{$member->volume}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>Data Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <p>Notes: [insert any important notes or issues related to the blood collection for the period]</p>
</body>

</html>