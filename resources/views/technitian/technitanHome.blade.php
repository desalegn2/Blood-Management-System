@extends('technitian.sidebar')
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

        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .top {
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        /* ======================= Cards ====================== */
        .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
        }

        .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
        }

        .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
        }

        .cardBox .card:hover {
            background: var(--blue);
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx {
            color: var(--white);
        }

        /* ================== Order Details List ============== */
        .details {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-gap: 30px;
            /* margin-top: 10px; */
        }



        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--blue);
        }

        .cardHeader .btn {
            position: relative;
            padding: 5px 10px;
            background: var(--blue);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details table thead td {
            font-weight: 600;
        }

        .details .recentOrders table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .recentOrders table tr:last-child {
            border-bottom: none;
        }

        .details .recentOrders table tbody tr:hover {
            background: var(--blue);
            color: var(--white);
        }

        .details .recentOrders table tr td {
            padding: 10px;
        }

        .details .recentOrders table tr td:last-child {
            text-align: end;
        }

        .details .recentOrders table tr td:nth-child(2) {
            text-align: end;
        }

        .details .recentOrders table tr td:nth-child(3) {
            text-align: center;
        }

        .status.notexpire {
            padding: 2px 4px;
            background: #8de02c;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.expire {
            padding: 2px 4px;
            background: #e9b10a;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.return {
            padding: 2px 4px;
            background: #f00;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.inProgress {
            padding: 2px 4px;
            background: #1795ce;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .recentCustomers {
            position: relative;
            display: grid;
            min-height: 500px;
            padding: 20px;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
        }

        .recentCustomers .imgBx {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50px;
            overflow: hidden;
        }

        .recentCustomers .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recentCustomers table tr td {
            padding: 12px 10px;
        }

        .recentCustomers table tr td h4 {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.2rem;
        }

        .recentCustomers table tr td h4 span {
            font-size: 14px;
            color: var(--black2);
        }

        .recentCustomers table tr:hover {
            background: var(--blue);
            color: var(--white);
        }

        .recentCustomers table tr:hover td h4 span {
            color: var(--white);
        }

        /* ====================== Responsive Design ========================== */
        @media (max-width: 991px) {
            .navigation {
                left: -300px;
            }

            .navigation.active {
                width: 300px;
                left: 0;
            }

            .main {
                width: 100%;
                left: 0;
            }

            .main.active {
                left: 300px;
            }

            .cardBox {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .details {
                grid-template-columns: 1fr;
            }

            .recentOrders {
                overflow-x: auto;
            }

            .status.inProgress {
                white-space: nowrap;
            }
        }

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
    </style>
</head>

<body>
    <div class="top">
        <!--  -->
        <h1></h1>
        <div style="margin-top: 0;">
            <a href="distributetohospital">
                <i style="margin-top: 0;" class="fa fa-bell"></i>
                <span style="margin-top: 0;" class="badge text-bg-secondary">{{$numberof_message}} New Message</span>
            </a>
            <img class="user" src="{{asset('assets/imgs/customer01.jpg')}}" alt="">
        </div>
    </div>
    <hr>
    <!-- ======================= Cards ================== -->

    <div class="grey-bg container-fluid">
        <section id="minimal-statistics">

            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Total Blood Stored</h4>
                    <p></p>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="#">
                                            <h3>{{$aminus}}</h3>
                                            <span>A-</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{{$aplus}}</h3>
                                        <span>A+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{{$bminus}}</h3>
                                        <span>B-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="bi bi-balloon-heart-fill"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{{$bplus}}</h3>
                                        <span>B+</span>
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
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{$abminus}}</h3>
                                        <span>AB-</span>
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
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$abplus}}</h3>
                                        <span>AB+</span>
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
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{$ominus}}</h3>
                                        <span>O-</span>
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
                            <div class="card-body" style="background-color: #850000;">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="primary">{{$oplus}}</h3>
                                        <span>O+</span>
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

        <!-- <section id="stats-subtitle">

            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Statistics With Subtitle</h4>
                    <p>Statistics on minimal cards with Title &amp; Sub Title.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Posts</h4>
                                        <span>Monthly blog posts</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>18,000</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="icon-speech warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Comments</h4>
                                        <span>Monthly blog comments</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>84,695</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="mr-2">$76,456.00</h1>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Sales</h4>
                                        <span>Monthly Sales Amount</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-heart danger font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="mr-2">$36,000.00</h1>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Cost</h4>
                                        <span>Monthly Cost</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-wallet success font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Blood Storage</h2>
                <a href="{{url('technitian/viewstoredblood')}}" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Blood Group</td>
                        <td>Volume</td>
                        <td>Duration</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bloods as $blood)
                    <tr>
                        <td>{{$blood->bloodgroup}}</td>
                        <td>{{$blood->volume}}</td>
                        <td scope="row">{{ $blood->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                        <td>{{$blood->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$bloods->links()}}
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h4>Handling, Storage & Returns of PRBCS</h4>
            </div>

            <table>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>David <br> <span>Italy</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Amit <br> <span>India</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>David <br> <span>Italy</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Amit <br> <span>India</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>David <br> <span>Italy</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Amit <br> <span>India</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>David <br> <span>Italy</span></h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>Amit <br> <span>India</span></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
@endsection