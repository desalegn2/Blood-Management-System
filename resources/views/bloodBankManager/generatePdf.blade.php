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
        .chart-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-left: 150px;
        }
        .chart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .chart-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
        #barChart {
            max-width: 900px;
            width: 100%;
            height: 450px;
            margin: 0 auto;
        }
        .line-container {
            position: relative;
            margin: 20px;
        }
        #donationsChart {
            width: 1000px;
            height: 500px;
            margin: 0 auto;
        }
        #expirationChart {
            width: 1000px;
            height: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="" id="div1" style="margin-top: 50px; margin-bottom:50px;">
        <h1 class="page-header text-center">Analysis</h1>
        <div class="row" style="float: right; margin-right:50px;">
            <div class="col-md-12 col-md-offset-1">
            </div>
        </div>
        <br><br>
        <form action="{{url('/bbmanager/report')}}" method="get">
            @csrf
            <div style="float: right;">
                <h6>Generate Report</h6>
                <select name="reporttype" id="selection" style="padding:6px;" required>
                    <option value="">Choose Report Type</option>
                    <option value="collection">Blood Collection Report</option>
                    <option value="distribution">Blood Distribute Report</option>
                    <!-- <option value="request">Blood Request Report</option> -->
                </select>
                <input type="submit" value="OK" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
    <div class="line-container">
        <h5 class="chart-title">Analysis Of Donor Data</h5>
        <canvas id="barChart"></canvas>
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
        <h5 class="chart-title">Analysis Of Blood Collection Rate</h5>
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
    <div>
        <h5 class="chart-title">Analysis Of Expired Blood</h5>
        <canvas id="expirationChart"></canvas>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('expirationChart').getContext('2d');
            var expiration = @json($expiration);
            var expirationTwo = @json($expiration_two);

            // Combine data from both tables into a single array
            var allExpiration = [...expiration, ...expirationTwo];

            // Group expiration by month and count the number of expiration in each month
            var monthlyExpiration = {};
            allExpiration.forEach(function(expiration) {
                var month = moment(expiration.created_at).format('YYYY-MM');
                if (monthlyExpiration[month]) {
                    monthlyExpiration[month]++;
                } else {
                    monthlyExpiration[month] = 1;
                }
            });

            console.log(monthlyExpiration); // Check the monthly expiration object

            var data = {
                labels: Object.keys(monthlyExpiration),
                datasets: [{
                    label: 'Number of Expiration',
                    data: Object.values(monthlyExpiration),
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
                        suggestedMin: 0,
                        suggestedMax: Math.max(...Object.values(monthlyExpiration)) + 5,
                        title: {
                            display: true,
                            text: 'Number of Expiration'
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
</body>

</html>
@endsection