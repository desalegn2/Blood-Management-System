@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #6f6f6f;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        section {
            padding: 60px 0;
            /* min-height: 100vh;*/
        }

        .sec-title {
            position: relative;
            z-index: 1;
            margin-bottom: 60px;
        }

        .sec-title .title {
            position: relative;
            display: block;
            font-size: 18px;
            line-height: 24px;
            color: #00aeef;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .sec-title h2 {
            position: relative;
            display: block;
            font-size: 40px;
            line-height: 1.28em;
            color: #222222;
            font-weight: 600;
            padding-bottom: 18px;
        }

        .sec-title h2:before {
            position: absolute;
            content: '';
            left: 0px;
            bottom: 0px;
            width: 50px;
            height: 3px;
            background-color: #d1d2d6;
        }

        .sec-title .text {
            position: relative;
            font-size: 16px;
            line-height: 26px;
            color: #848484;
            font-weight: 400;
            margin-top: 35px;
        }

        .sec-title.light h2 {
            color: #ffffff;
        }

        .sec-title.text-center h2:before {
            left: 50%;
            margin-left: -25px;
        }

        .list-style-one {
            position: relative;
        }

        .list-style-one li {
            position: relative;
            font-size: 16px;
            line-height: 26px;
            color: #222222;
            font-weight: 400;
            padding-left: 35px;
            margin-bottom: 12px;
        }

        .list-style-one li:before {
            content: "\f058";
            position: absolute;
            left: 0;
            top: 0px;
            display: block;
            font-size: 18px;
            padding: 0px;
            color: #ff2222;
            font-weight: 600;
            -moz-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1.6;
            font-family: "Font Awesome 5 Free";
        }

        .list-style-one li a:hover {
            color: #44bce2;
        }

        .btn-style-one {
            position: relative;
            display: inline-block;
            font-size: 17px;
            line-height: 30px;
            color: #ffffff;
            padding: 10px 30px;
            font-weight: 600;
            overflow: hidden;
            letter-spacing: 0.02em;
            background-color: #00aeef;
        }

        .btn-style-one:hover {
            background-color: #0794c9;
            color: #ffffff;
        }

        .about-section {
            position: relative;
            padding: 120px 0 70px;
        }

        .about-section .sec-title {
            margin-bottom: 45px;
        }

        .about-section .content-column {
            position: relative;
            margin-bottom: 50px;
        }

        .about-section .content-column .inner-column {
            position: relative;
            padding-left: 30px;
        }

        .about-section .text {
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 26px;
            color: #848484;
            font-weight: 400;
        }

        .about-section .list-style-one {
            margin-bottom: 45px;
        }

        .about-section .btn-box {
            position: relative;
        }

        .about-section .btn-box a {
            padding: 15px 50px;
        }

        .about-section .image-column {
            position: relative;
        }

        .about-section .image-column .text-layer {
            position: absolute;
            right: -110px;
            top: 50%;
            font-size: 325px;
            line-height: 1em;
            color: #ffffff;
            margin-top: -175px;
            font-weight: 500;
        }

        .about-section .image-column .inner-column {
            position: relative;
            padding-left: 80px;
            padding-bottom: 0px;
        }

        .about-section .image-column .inner-column .author-desc {
            position: absolute;
            bottom: 16px;
            z-index: 1;
            background: red;
            padding: 10px 15px;
            left: 96px;
            width: calc(100% - 152px);
            border-radius: 50px;
        }

        .about-section .image-column .inner-column .author-desc h2 {
            font-size: 21px;
            letter-spacing: 1px;
            text-align: center;
            color: #fff;
            margin: 0;
        }

        .about-section .image-column .inner-column .author-desc span {
            font-size: 16px;
            letter-spacing: 6px;
            text-align: center;
            color: #fff;
            display: block;
            font-weight: 400;
        }

        .about-section .image-column .inner-column:before {
            content: '';
            position: absolute;
            width: calc(50% + 80px);
            height: calc(100% + 120px);
            top: -80px;
            left: -3px;
            /* background: transparent; */
            z-index: 0;
            /* border: 44px solid #00aeef; */
        }

        .about-section .image-column .image-1 {
            position: relative;
        }

        .about-section .image-column .image-2 {
            position: absolute;
            left: 0;
            bottom: 0;
        }

        .about-section .image-column .image-2 img,
        .about-section .image-column .image-1 img {
            box-shadow: 0 30px 50px rgba(8, 13, 62, .15);
            border-radius: 46px;
        }

        .about-section .image-column .video-link {
            position: absolute;
            left: 70px;
            top: 170px;
        }

        .about-section .image-column .video-link .link {
            position: relative;
            display: block;
            font-size: 22px;
            color: #191e34;
            font-weight: 400;
            text-align: center;
            height: 100px;
            width: 100px;
            line-height: 100px;
            background-color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 30px 50px rgba(8, 13, 62, .15);
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .about-section .image-column .video-link .link:hover {
            background-color: #191e34;
            color: #191e34;
        }
    </style>
</head>

<body>
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">ስለ እኛ</span>
                            <h2>በደምዎ ህይዎትን ያስቀጥሉ
                            </h2>
                        </div>
                        <div class="text">
                            ከ1% በታች የሚሆነው የኢትዮጵያ ደም ለጋሾች ንቁ ናቸው።
                            አንድ የደም ክፍል የሚቆየው ከለገሱ በኋላ ለ 90 ቀናት ብቻ ነው, በዚህ ምክንያት ደም ለጋሾች
                            በየጊዜው መለገስ አስፈላጊ ነው. ለጋሾች በ12 ሳምንቱ ብዙ ጊዜ ደም መስጠት ይችላሉ።

                            ደም ወደ ቀይ የደም ሴሎች፣ ፕላዝማ እና ፕሌትሌትስ ስለሚለያይ እያንዳንዱ የደም ክፍል ቢያንስ
                            የሶስት ህይወትን ማዳን ይችላል።

                            በጤና አጠባበቅ ስርዓት ውስጥ ደህንነቱ የተጠበቀ እና በቂ የደም አቅርቦትን ለማረጋገጥ በቀን
                            3000 ዩኒት ደም ለመሰብሰብ ያለመ ነው።

                            ለህዝብ ክፍት የሆኑ ብዙ የደም ልገሳ ማዕከላት አሉ። ወይም ለሁሉም የሰራተኛ አባላት ምቾት
                            ሲባል ቀጣሪዎ በቢሮዎ ውስጥ የደም ግፊትን እንዲያስተናግድ ለማነሳሳት ሊያስቡበት ይችላሉ።
                        </div>


                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="author-desc">
                            <h2>BAHIR DAR </h2>
                            <span>BLOOD BANK</span>
                        </div>
                        <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img style="height: 400px;" title="Bahir Dar Blood Bank" src="{{asset('assets/imgs/aboutus.png')}}" alt=""></a></figure>

                    </div>
                </div>

            </div>

            <div class="sec-title">
                <span class="title">Mission</span>

            </div>
            <div class="text">
                የባህር ዳር ደም ባንክ አገልግሎት ተልዕኮ ለሁሉም ህሙማን በቂ፣ ደህንነቱ የተጠበቀ፣ ጥራት<br>
                ያለው የደም ምርት እና ደም ከመውሰድ ጋር የተያያዙ የህክምና አገልግሎቶችን ፍትሃዊ፣ ወጪ<br>
                ቆጣቢ በሆነ መንገድ ማቅረብ ነው።
            </div>

            <div class="sec-title">
                <span class="title">Vision</span>
            </div>
            <div class="text">
                በህይወት ስጦታው በኢትዮጵያ የጤና አገልግሎት የማዕዘን ድንጋይ ለመሆን።
            </div>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.4225642360157!2d37.38063771447331!3d11.593192846756851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1644cfdc6cf0c047%3A0x287c29bd91e8e341!2sBahir%20Dar%20Blood%20Bank!5e0!3m2!1sen!2snl!4v1677426336759!5m2!1sen!2snl" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>
</body>

</html>
@endsection