<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Donor Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        /* drop down css */
        .dropbtn {

            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #FF7B54;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        header {
            position: fixed;
            height: 100px;
            background: #245953;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
            /* overflow-y: scroll; */

        }

        .inner-width {
            max-width: 1000px;
            padding: 0 10px;
            margin: auto;
        }

        .logo {
            float: left;
            padding: 27px 0;
            color: #fff;
        }

        .logo img {
            height: 50px;
        }

        .navigation-menu {
            float: left;
            display: flex;
            align-items: center;
            min-height: 90px;

        }

        .navigation-menu a {
            margin-left: 10px;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            padding: 12px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: .3s linear;

        }

        .navigation-menu a:hover {
            /* background: #273b91; */
            text-decoration: none;
            color: #fff;
            transform: scale(1.1);
        }

        .navigation-menu i {
            margin-right: 8px;
            font-size: 16px;
        }

        .home {
            color: #fff;
        }

        a.profile {
            background: #227C70;
            color: #fff;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 50%;
            width: 62px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        a.profile:hover {
            background: #fff;
            color: #273b91;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .menu-toggle-btn {
            float: right;
            height: 90px;
            line-height: 90px !important;
            color: #fff;
            font-size: 26px;
            display: none !important;
            cursor: pointer;
        }


        @media screen and (max-width:900px) {
            .menu-toggle-btn {
                display: block !important;

            }

            .navigation-menu {
                position: fixed;
                width: 100%;
                max-width: 400px;
                background: #172b4d;
                top: 90px;
                right: 0;
                display: none;
                padding: 20px 40px;
                box-sizing: border-box;
                z-index: 99;

            }

            .navigation-menu::before {
                content: "";
                border-left: 10px solid transparent;
                border-right: 10px solid transparent;
                border-bottom: 10px solid #172b4d;
                position: absolute;
                top: -10px;
                right: 10px;
            }

            .navigation-menu a {
                display: block;
                margin: 1px 0;


            }

            .navigation-menu.active {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div>

        <header>

            <!-- <div class="inner-width" style="width: 90vw; height: 8px;">  -->

            <i class="menu-toggle-btn fas fa-bars" style="margin-right: 2rem;"></i>
            <nav class="navigation-menu" style="margin: auto;">
                <a href="{{url('/donor/profile',Auth::user()->id)}}" class="profile">
                    Profile
                </a>
                <a href="{{url('/donor/home')}}">Home</a>
                <a href="{{url('/donor/news')}}"></i> News</a>
                <a href="{{url('/donor/information')}}"></i> Blood Bank Information</a>
                <!-- <a href="{{url('/donor/seeker')}}"></i> View Seeker</a> -->
                <!-- <a href="{{url('/donor/donorregister')}}"></i> Registor</a>
                <a href="{{url('/donor/history',Auth::user()->id)}}"></i> Rigstration Status</a> -->
                <div class="dropdown">
                    <a href="" class="dropbtn"></i> Reservation</a>
                    <div class="dropdown-content">
                        <a href="{{url('/donor/reservationform')}}">Send Reservation</a>
                        <a href="{{url('/donor/reservationhistory',Auth::user()->id)}}">View Reservation Status</a>
                    </div>
                </div>
                <a href="{{url('/donor/asks')}}"></i>Chatbot</a>
                <a href="{{url('/donor/refer',Auth::user()->id)}}"></i> Refere Others</a>
                <!-- <a href=""></i> Reservation Status</a> -->
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
            <!-- </div>  -->
        </header>

    </div>
    <br><br>
    <div>
        @yield('content')
    </div>

    @include('donor.footer')
    <script>
        $(".menu-toggle-btn").click(function() {
            $(this).toggleClass("fa-times");
            $(".navigation-menu").toggleClass("active");
        });
    </script>
</body>

</html>