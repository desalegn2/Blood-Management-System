@extends('donor.sidebar')
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
    <title>Document</title>

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
                <img class="d-block w-100" src="{{asset('assets/imgs/c.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/imgs/r.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/imgs/b.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
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
            <h3 class="text-center" href="">Home</h3>
        </div>

        <div class="row people">

            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/provisioredbloodcell.jpg')}}">
                    <h3 class="name">Provision of Red Blood Cell</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" src="{{asset('assets/imgs/blood2.jpg')}}">
                    <h3 class="name">Blood Donation</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" src="{{asset('assets/imgs/c.jpg')}}">
                    <h3 class="name">Blood Storage</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img style="width:236px; height:279px" class="" src="{{asset('assets/imgs/c.jpg')}}">
                    <h3 class="name">Blood Storage</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/provisionplatlets.jpg')}}">
                    <h3 class="name">provision of platlets</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" style="width:236px; height:279px" src="{{asset('assets/imgs/bloodstorage.jpg')}}">
                    <h3 class="name">Blood Storage</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>


        </div>


    </div>

    <h1>Hello, world!</h1>

    <div class="container mt-5">



        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/c.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Benefit of Donating Blood</h3>
                    <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates corrupti possimus quae quidem itaque voluptatum, delectus quo soluta voluptate sequi dignissimos eos sint neque! Possimus cumque magnam excepturi necessitatibus obcaecati?</p>
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
    <!-- <center>Event</center> -->
    <div class="container">

        <div class="intro">
            <h2 class="text-center">Event </h2>
            <h3 class="text-center" href="">Home</h3>
        </div>

        <div class="row people">

            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" src="{{asset('assets/imgs/2.jpg')}}">
                    <h3 class="name">Provision of Red Blood Cell</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="" src="{{asset('assets/imgs/1.jpg')}}">
                    <h3 class="name">Blood Donation</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="img-fluid" src="{{asset('assets/imgs/l.jpg')}}">
                    <h3 class="name">Blood Storage</h3>
                    <!-- <p class="title">email</p> -->
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis libero dolores vero autem, ipsa rerum tempora magnam placeat magni! Nesciunt aspernatur libero id eaque quas quae corrupti a totam!</p>
                    <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    <div class="social"><a href="">View Detail</a></div>
                    <a href="mailto:">Send Reservation</a>
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
                    <p class="card-text mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, modi et inventore deleniti alias odio similique ducimus officia quidem? Necessitatibus illo a totam perferendis minima, laborum adipisci optio. Eveniet, optio.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore et rerum est aliquid, dolore amet quisquam sit, harum porro suscipit officia a ex laborum tenetur cupiditate dicta unde corporis quidem.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates corrupti possimus quae quidem itaque voluptatum, delectus quo soluta voluptate sequi dignissimos eos sint neque! Possimus cumque magnam excepturi necessitatibus obcaecati?</p>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="{{asset('assets/imgs/c.jpg')}}" alt="...">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
@endsection