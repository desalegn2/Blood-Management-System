@extends('healthinstitute.sidebar')
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


        /* ================== Order Details List ============== */

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
    </div>

    <div class="container mt-5">

        <h1>Handling, Storage & Returns </h1>
        <h4> PACKED RED BLOOD CELLS (PRBCS) RED BLOOD CELLS (RBCS)

        </h4>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/handling-blood-samples.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Handling</h3>
                    <p class="card-text mb-4">Once dispensed, any PRBCs shall be immediately transported directly to the RN or LIP requesting the component for transfusion.</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>

        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/blood-samples-are-stored-in-a-hospital.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Storage / Shelf Life</h3>
                    <p class="card-text mb-4">PRBCs are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/return-blood.png')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Returns</h3>
                    <p class="card-text mb-4">If the transfusion cannot be initiated within a time frame that would allow for completion within 4 hours of time issued, return the component to the Blood Bank.</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/exception.png')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Exception</h3>
                    <p class="card-text mb-4">Blood can be stored in a Blood Bank validated cooler for up to 6 hours. The cooler must be returned to the Blood Bank prior to the 6 hour cooler expiration time. The cooler will then be repacked and reissued if the blood products are still needed.</p>
                    <p><b>The cooler expiration time is noted on the outside of the cooler.</b></p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
@endsection