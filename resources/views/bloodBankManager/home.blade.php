@extends('bloodBankManager.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" integrity="sha512-rO7BTsTmR9YNS+2kszOsZTKBszvgvFK34MnKj+n3x8yDkBOyv4vj4g4n/x6N8WUrGLz4skGrlrs+Fw5w6UxL6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-0r1NlKDCGIn2N+axvA8ygN1zbd0U5if6PfKj77FSCZwEa00P4D89j4f4Ux4HbFZB1Y9Y22VZp3qZ3OwUXvvLAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- chart js library 
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('node_modules/chart.js/dist/chart.min.js') }}"></script> -->

    <style>
        /* =========== Google Fonts ============ */
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");
        .piechart {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .item {
            width: 500px;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="grey-bg container-fluid mt-1">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">

                    <h4 class="text-uppercase">Total Blood In Our Stock</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="{{url('nurse/aminusdonor')}}">
                                            <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        </a>
                                        <h3><strong>{{$aminus}}</strong></h3>
                                        <span><strong>A-</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$aplus}}</strong></h3>
                                        <span><strong>A+</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$bminus}}</strong></h3>
                                        <span><strong>B-</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$bplus}}</strong></h3>
                                        <span><strong>B+</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$abminus}}</strong></h3>
                                        <span><strong>AB-</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$abplus}}</strong></h3>
                                        <span><strong>AB+</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F55050;"></ion-icon>
                                        <h3><strong>{{$ominus}}</strong></h3>
                                        <span><strong>O-</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #8EA7E9;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <ion-icon name="water-outline" style="float: left; font-size: 80px; color: #F94A29;"></ion-icon>
                                        <h3><strong>{{$oplus}}</strong></h3>
                                        <span><strong>O+</strong></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="piechart">
        <div class="grid1">
            <div class="item" style="width: 500px;">
                <p>Percentage Of Blood Type</p>
                <canvas id="myChart"></canvas>
            </div>

        </div>
        
    </div>

    <!-- <div style="width: 500px; border:#222 solid; float:right; margin-top:30px;">
        <p>Percentage of blood type</p>
        <canvas id="myChart"></canvas>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

    <!-- chart js cdn -->
    <script src="https://unpkg.com/chart.js"></script>
    <!-- latest version chart  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
    <!-- chartjs-plugin-datalabels -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var bloodTypes = @json($bloodTypes);
            var volumes = @json($volumes);

            var data = volumes;
            var labels = bloodTypes;

            var total = data.reduce((accumulator, currentValue) => accumulator + currentValue, 0);

            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'red',
                            'green',
                            'purple',
                            'black',
                            'blue',
                            'yellow',
                            '#00FFCA',
                            'brown'
                        ],
                        borderColor: [
                            'red',
                            'green',
                            'purple',
                            'black',
                            'blue',
                            'yellow',
                            '#00FFCA',
                            'brown'
                        ],
                        borderWidth: 2
                    }],
                    labels: labels
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            align: 'start',

                            labels: {
                                font: {
                                    size: 12,
                                },
                                padding: 30
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.label || '';
                                    var value = context.raw || '';
                                    var percent = (value / total) * 100;

                                    return label + ': ' + value + ' (' + percent.toFixed(2) + '%)';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
@endsection