<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .full {
            width: 100%;
        }

        .gap {
            height: 70px;
            width: 100%;
            clear: both;
            display: block;
        }

        .footer {
            background: #2C3333;
            height: auto;
            padding-bottom: 30px;
            position: relative;
            width: 100%;
            border-bottom: 1px solid #CCCCCC;
            border-top: 1px solid #DDDDDD;
        }

        .con {
            width: 100%;
        }

        .footer p {
            margin: 0;
        }

        .footer img {
            max-width: 100%;
        }

        .footer h3 {
            /* border-bottom: 1px solid #BAC1C8; */
            color: #54697E;
            font-size: 18px;
            font-weight: 600;
            line-height: 27px;
            padding: 40px 0 10px;
            text-transform: uppercase;
        }

        .footer ul {
            font-size: 13px;
            list-style-type: none;
            margin-left: 0;
            padding-left: 0;
            margin-top: 15px;
            color: #7F8C8D;
        }

        .footer ul li a {
            padding: 0 0 5px 0;
            display: block;
            text-decoration: none;
        }

        .footer a {
            font-size: large;
            color: whitesmoke;
            text-decoration: none;
        }

        .supportLi h4 {
            font-size: 20px;
            font-weight: lighter;
            line-height: normal;
            margin-bottom: 0 !important;
            padding-bottom: 0;
        }

        .newsletter-box input#appendedInputButton {
            background: #FFFFFF;
            display: inline-block;
            float: left;
            height: 30px;
            clear: both;
            width: 100%;
        }

        .newsletter-box .btn {
            border: medium none;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -o-border-radius: 3px;
            -ms-border-radius: 3px;
            border-radius: 3px;
            display: inline-block;
            height: 40px;
            padding: 0;
            width: 100%;
            color: #fff;
        }

        .newsletter-box {
            overflow: hidden;
        }

        .bg-gray {
            background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
            box-shadow: 0 1px 0 #B4B3B3;
        }

        .social li {
            background: none repeat scroll 0 0 #03C988;
            border: 2px solid #B5B5B5;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -o-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
            float: left;
            height: 40px;
            line-height: 36px;
            margin: 0 8px 0 0;
            padding: 0;
            text-align: center;
            width: 40px;

            transition: all 0.5s ease 0s;
            -moz-transition: all 0.5s ease 0s;
            -webkit-transition: all 0.5s ease 0s;
            -ms-transition: all 0.5s ease 0s;
            -o-transition: all 0.5s ease 0s;
        }

        .social li:hover {
            transform: scale(1.15) rotate(360deg);
            -webkit-transform: scale(1.1) rotate(360deg);
            -moz-transform: scale(1.1) rotate(360deg);
            -ms-transform: scale(1.1) rotate(360deg);
            -o-transform: scale(1.1) rotate(360deg);
        }

        .social li a {
            color: #EDEFF1;
        }

        .social li:hover {
            border: 2px solid #2c3e50;
            background: #2c3e50;
        }

        .social li a i {
            font-size: 30px;
            margin: 0 0 0 5px;
            color: #EDEFF1 !important;
        }

        .footer-bottom {
            background: #E3E3E3;
            border-top: 1px solid #DDDDDD;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .footer-bottom p.pull-left {
            padding-top: 6px;
        }

        .payments {
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <footer>
        <div class="footer" id="footer">
            <div class="con">
                <div class="row" style=" text-align: center;">
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <img class='mt-4' style="border-radius:59%; width: 100px; height:100px; float: center;" src="{{asset('assets/imgs/bblogo3.png')}}" alt="">
                        <a href="#">
                        </a>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> About Us</h3>
                        <ul>
                            <li> <a href="{{url('donor/aboutus')}}"> about us </a> </li>
                            <li> <a href="{{url('/donor/news')}}">FeedBack</a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Want To Donate</h3>
                        <ul>
                            <li> <a href="{{ url('/donor/reservationform') }}">Blood Donation </a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                        <h3> Contact Us </h3>
                        <ul class="social" style="display:flex; justify-content: center; align-items: center; gap: 1rem;">
                            <li> <a href="https://www.facebook.com/bdrbloodbank" value=""> <i class=" fa fa-facebook"> </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter"> </i> </a> </li>
                            <!-- <li> <a href="#"> <i class="fa fa-google"> </i> </a> </li> -->
                            <li> <a href="mailto:mikshif2001@gmail.com"> <i class="fa fa-envelope"> </i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-telegram"> </i> </a> </li>
                        </ul>
                        <br> <br> <br>
                        <h1 style="color:white;">+251 582207515</h1>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>