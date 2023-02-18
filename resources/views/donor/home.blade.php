@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>

    <style>
        * {
            right: 0;
        }

        .carousel-item {
            height: 70vh;
            min-height: 200px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .carousel-caption {
            bottom: 270px;
        }

        .carousel-caption h5 {
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 25px;
        }

        .carousel-caption p {
            width: 75%;
            margin: auto;
            font-size: 18px;
            line-height: 1.9;
        }

        /* Card */
        .team-boxed {
            color: #313437;
            background-color: #FF8E9E;
        }

        .team-boxed p {
            color: #7d8285;
        }

        .team-boxed h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .team-boxed h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-boxed .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-boxed .intro p {
            margin-bottom: 0;
        }

        .team-boxed .people {
            padding: 50px 0;
        }

        .team-boxed .item {
            text-align: center;
        }

        .team-boxed .item .box {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .team-boxed .item .name {
            font-weight: bold;
            margin-top: 28px;
            margin-bottom: 8px;
            color: inherit;
        }

        .team-boxed .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #d0d0d0;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .team-boxed .item .description {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .team-boxed .item img {
            max-width: 160px;
        }

        .team-boxed .social {
            font-size: 18px;
            color: #a2a8ae;
        }

        .team-boxed .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-boxed .social a:hover {
            opacity: 1;
        }
    </style>
</head>

<body>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('assets/imgs/p13.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Blood Donation Illustration</h5>
                    <p style="color: green;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/imgs/r.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Blood Donation Illustration</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/imgs/d.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black;">Blood Donation Illustration</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <div class="container">
        <div class="intro">
            <h2 class="text-center">Service </h2>
        </div>

        <div class="row people">

            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/provisioredbloodcell.jpg')}}">
                    <h3 class="name">Provision of Red Blood Cell</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Red blood cells are responsible for transporting oxygen from your lungs to your body’s tissues. Your tissues produce energy with the oxygen and release a waste, identified as carbon dioxide. Your red blood cells take the carbon dioxide waste to your lungs for you to exhale</p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" src="{{asset('assets/imgs/blood2.jpg')}}">
                    <h3 class="name">Blood Donation</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" src="{{asset('assets/imgs/c.jpg')}}">
                    <h3 class="name">Blood Storage</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">
                        PRBCs are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).
                    </p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" class="" src="{{asset('assets/imgs/c.jpg')}}">
                    <h3 class="name">Blood Camp Management</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/provisionplatlets.jpg')}}">
                    <h3 class="name">provision of platlets</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Platelet transfusion is a lifesaving procedure that is carried out to prevent bleeding or stop ongoing bleeding in patients with low platelet count or functional platelet disorders.s</p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/bloodstorage.jpg')}}">
                    <h3 class="name">Donor Management</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">
                        Donor management is an essential aspect of nonprofit management that involves building and maintaining relationships with all your donors and tracking various donor details and interactions. Although it sounds simple, donor management requires paying close attention to your donors’ activity, habits, and experiences. As a nonprofit, you must be prepared to manage a large donor base that consists of all types of donors — recurring donors, one-time donors, major donors, or in-kind donors.
                    </p>

                    <div class="social"><a href="">View Detail</a></div>

                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">

        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Benefit of Donating Blood</h3>
                    <p class="card-text mb-4">
                        The health benefits of donating blood are considerable—but of course, the most important part of the process is helping to save lives. Donating blood is good for you, and it's even better for all the people who desperately need the help.
                        helping others can:<br>
                    <ul>
                        <li>reduce stress</li>
                        <li>improve your emotional well-being</li>
                        <li> benefit your physical health</li>
                        <li>help get rid of negative feelings</li>
                        <li> provide a sense of belonging and reduce isolation</li>
                        <li>Research has found further evidence of the health benefits that come specifically from donating blood.</li>
                    </ul>
                    <br>

                    </p>
                    <button class="mb-4" href="" style="float: right;">share </button>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                        <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="card col-md-8 ml-5">
                    <!-- <img class="img-fluid" src="{{asset('assets/imgs/c.jpg')}}" alt="..."> -->
                    <h3 class="card-title mt-2">Why Donate Blood</h3>
                    <p class="card-text mb-4">
                        There is no substitute for blood. Donors provide the only supply of life-saving blood for those in need. Donating is simple, fast, and convenient. The donation process can take as little as 45 minutes of your time, but can make a lifelong difference for someone else.
                    </p>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
                    <!-- <h3 class="card-title mt-2">Title</h3>
                    <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates corrupti possimus quae quidem itaque voluptatum, delectus quo soluta voluptate sequi dignissimos eos sint neque! Possimus cumque magnam excepturi necessitatibus obcaecati?</p>
                    <button class="mb-4" href="" style="float: right;">share </button>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                        <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                    </a> -->
                </div>
                <div class="card-footer">
                    <small class="text-muted"></small>
                    <a href="" style="float: left;">Read more</a>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
@endsection