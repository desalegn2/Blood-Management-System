<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manager Page</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 70px;
            --first-color: #4723D9;
            --red-color: #2F4F4F;
            --first-color-black: #000000;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        .nav_list {
            overflow-y: auto;
            max-height: calc(100vh - 220px);
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s;
            overflow-y: scroll;


        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--red-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);
            overflow-y: auto;
            height: 100%;
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* overflow-y: scroll; */
            overflow: hidden;
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem;
            text-decoration: none;

        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--white-color);
            margin-bottom: 1.5rem;
            transition: .3s;
        }

        .nav_link:hover {
            color: var(--first-color-black);
            text-decoration: none;
        }

        .nav_link.active {
            background-color: #fff;
            color: black;
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 1rem)
            }

            .header {
                height: calc(var(--header-height) + 0.5rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 1rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0;
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }
    </style>

</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

            <div class="header_img"> <img src="{{asset('assets/imgs/aboutus.png')}}" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">

            <nav class="nav">
                <div> <a href="{{url('/healthinstitute/profile',Auth::user()->id)}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Profile</span> </a>
                    <div class="nav_list">
                        <a href="{{url('/healthinstitute/home')}}" class="nav_link{{ Request::is('healthinstitute/home') ? ' active' : '' }}"><span class="bx bx-home nav_icon"></span><span class="bx nav_name">Dashboard</span></a>
                        <a href="{{url('/healthinstitute/hospitalrequest')}}" class="nav_link{{ Request::is('healthinstitute/hospitalrequest') ? ' active' : '' }}"><span class="bx bx-list-plus nav_icon"></span><span class="bx nav_name">Blood Request</span></a>
                        <a href="{{url('/healthinstitute/history',Auth::user()->id)}}" class="nav_link{{ Request::is('healthinstitute/history',Auth::user()->id) ? ' active' : '' }}"><span class="bx bx-list-ul nav_icon"></span><span class="bx nav_name">View Request</span></a>
                        <!-- <a href="{{url('/healthinstitute/posts')}}" class="nav_link{{ Request::is('healthinstitute/posts') ? ' active' : '' }}"><span class="bx bx-user nav_icon"></span><span class="bx nav_name">Post Seekers</span></a>
                        <a href="{{url('/healthinstitute/aa',Auth::user()->id)}}" class="nav_link{{ Request::is('healthinstitute/aa') ? ' active' : '' }}"><span class="bx bx-file nav_icon"></span><span class="bx nav_name">Our Post</span></a> -->
                        <a href="{{url('/healthinstitute/adddoctor')}}" class="nav_link{{ Request::is('healthinstitute/adddoctor') ? ' active' : '' }}"><span class="bx bx-user-plus nav_icon"></span><span class="bx nav_name">Add Doctor</span></a>
                    </div>
                </div> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="bx nav_name">
                        SignOut
                    </span> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
        <div class="height-100 bg-light">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            nav.classList.toggle('show')
                            toggle.classList.toggle('bx-x')
                            bodypd.classList.toggle('body-pd')
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))
            });
        </script>
    </body>

</html>