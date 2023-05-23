@extends('bloodBankManager.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container" id="div1">
        <h1 class="page-header text-center">Analysis</h1>
        <form action="{{url('/bbmanager/report')}}" method="get">
            @csrf
            <div style="float: right;">
                <h6>Generate Report</h6>
                <select name="reporttype" id="selection" required>
                    <option value="">Choose Report Type</option>
                    <option value="collection">Blood Collection Report</option>
                    <option value="distribution">Blood Distribute Report</option>
                    <option value="request">Blood Request Report</option>
                </select>
                <input type="submit" value="OK" class="btn btn-primary btn-block">
            </div>
        </form>
        <!-- <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                    
            </div>
        </div> -->
    </div>
    <div>
        <h5>Analysis Of Donor Data</h5>
        <canvas id="barChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var bloodTypes = @json($bloodTypes);
        var donorCounts = @json($donorCounts);
        var ctx = document.getElementById('barChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bloodTypes,
                datasets: [{
                    label: 'Number of Donors',
                    data: donorCounts,
                    backgroundColor: '#1D267D',
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Blood Type'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Donors'
                        },
                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            }
        });
    </script>

    <div>
        <h5>Analysis Of Donation Rate</h5>
        <canvas id="donationsChart" width="400" height="200"></canvas>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('donationsChart').getContext('2d');
            var donations = @json($donations);

            // Group donations by month and count the number of donations in each month
            var monthlyDonations = {};
            donations.forEach(function(donation) {
                var month = moment(donation.created_at).format('YYYY-MM');
                if (monthlyDonations[month]) {
                    monthlyDonations[month]++;
                } else {
                    monthlyDonations[month] = 1;
                }
            });

            console.log(monthlyDonations); // Check the monthly donations object

            var data = {
                labels: Object.keys(monthlyDonations),
                datasets: [{
                    label: 'Number of Donations',
                    data: Object.values(monthlyDonations),
                    borderColor: 'blue',
                    fill: true
                }]
            };

            var options = {

                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'month',
                            displayFormats: {
                                month: 'MMM YYYY'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Donations'
                        }
                    }
                }
            };

            var chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        });
    </script>
    <!-- <script>
        function myfunction() {
            // var element = document.body;
            // element.classList.toggle("dark");
            document.getElementById("div1").style.backgroundColor = "black";
        }
    </script> -->
</body>

</html>
@endsection