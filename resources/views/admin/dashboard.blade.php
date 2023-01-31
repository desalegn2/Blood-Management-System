@extends('admin.sidebars')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- ======= Bootstrap css ====== -->
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
            --red:
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
            /* display: grid; */
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


    <!-- ======================= Cards ================== -->



    <div class="grey-bg container-fluid">


        <section id="stats-subtitle">


            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Statistics </h4>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">

                                        <h4>Total Donor Registered</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_donor}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Nurse</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_nurse}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="stats-subtitle">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">

                                        <h4>Total Technician Registered</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_tech}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Encoder</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_encoder}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Manager</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_manager}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix" style="background-color: #03C988;">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Health Institute</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_hi}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card" style="background-color: #F99417;">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <ion-icon name="people-outline" style="float: left; font-size: 80px; color: blue;"></ion-icon>
                                    </div>
                                    <div class="media-body">
                                        <h4>Blocked</h4>
                                        <span></span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$numberof_blocked}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>{{$numberof_user}} Total user</h2>
                <a href="" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Full Name</td>
                        <td>Role</td>
                        <td>Email</td>
                        <td>Joined Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                    <tr>
                        <td>{{$u->name}}</td>
                        <td>{{$u->role}}</td>
                        <td>{{$u->email}}</td>
                        <td scope="row">{{ $u->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$user->links()}}
        </div>
        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Recent User Joined</h2>
            </div>
            @foreach($stats as $stat)
            <table>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="{{asset('uploads/registers/'.$stat->photo)}}" alt=""></div>
                    </td>
                    <td>
                        <h4>{{$stat->name}} <br> <span>{{$stat->role}}</span></h4>
                    </td>

                </tr>

            </table>
            @endforeach
        </div>
    </div>




    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
@endsection