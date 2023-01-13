@extends('admin.adminlte')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>{{$numberof_message}} user
                                <span class="badge badge-warning navbar-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">New Notifications</span>
                                <div class="dropdown-divider"></div>

                                <a href="viewnewusers" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i>{{$numberof_message}}
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>

                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <h5 class="mb-2">Available Blood in Store</h5>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h1>A+</h1>
                            </span>
                            <span class="info-box-number">{{$aplus}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h1>A-</h1>
                            </span>
                            <span class="info-box-number">{{$aminus}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h1>B+</h1>
                            </span>
                            <span class="info-box-number">{{$bplus}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h1>B-</h1>
                            </span>
                            <span class="info-box-number">{{$bminus}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h1>AB+</h1>
                                </span>
                                <span class="info-box-number">{{$abplus}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h1>AB-</h1>
                                </span>
                                <span class="info-box-number">{{$abminus}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h1>O+</h1>
                                </span>
                                <span class="info-box-number">{{$oplus}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <img src="{{asset('assets/imgs/p7.jpg')}}" width="120px" height="120px" alt="">

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h1>O-</h1>
                                </span>
                                <span class="info-box-number">{{$ominus}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->



    </section>
    <div>
        Totol donor
    </div>
</div>


@endsection