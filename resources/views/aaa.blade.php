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


        .hidden {
            display: none;
        }

        header {
            position: fixed;
            height: 100px;
            background-color: rgb(30, 144, 255);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
            /* overflow-y: scroll; */

        }

        .language-switcher {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .language-switcher label {
            margin-right: 0.5rem;
        }

        .language-switcher select {
            font-size: 1rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            border: none;
            background-color: #f1f1f1;
            color: #333;
            cursor: pointer;
        }

        .menu-toggle-btn {
            display: none;
            cursor: pointer;
        }

        .menu-item {
            display: inline-block;
            margin-right: 1rem;
        }

        .menu-item a {

            padding: 12px 20px;
            color: white;
            border-radius: 4px;
            font-size: 1.2rem;
            text-decoration: none;
            display: inline-block;
            position: relative;
            margin-top: 1.5rem;
            padding: 0.5rem;
            transition: .3s linear;
        }

        .menu-item a:hover {
            color: #fff;
        }

        .menu-item a.active {
            background-color: #19A7CE;
            color: #fff;
        }

        .dropbtn {
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            display: inline-block;
            position: relative;
        }

        .dropdown a {
            text-decoration: none;
            font-size: 1.2rem;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
            background-color: #f1f1f1;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border-radius: 0.25rem;
        }

        .dropdown-content a {
            color: #333;
            padding: 0.5rem;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media screen and (max-width: 768px) {
            .menu-toggle-btn {
                display: block;
                position: absolute;
                top: 1rem;
                right: 1rem;
                font-size: 1.5rem;
            }

            .navigation-menu {
                /* display: none;
                position: absolute;
                top: 4rem;
                left: 0;
                width: 100%;
                background: #172b4d;
                padding: 1rem; */

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

            .navigation-menu.active {
                display: block;
            }

            .menu-item {
                display: block;
                margin: 1rem 0;
            }

            .menu-item a {
                display: block;
                padding: 0.5rem 0;
                margin: 0;
            }

            .dropdown-content {
                position: static;
                display: block;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <div>
        <div>
            <header>
                <i class="menu-toggle-btn fas fa-bars" style="margin-right: 2rem;"></i>
                <nav class="navigation-menu" style="margin: auto;">

                    <div class="menu-item">
                        <a href="">
                            <span class="en">Home</span>
                            <span class="am hidden">መነሻ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="about">
                            <span class="en">About</span>
                            <span class="am hidden">ስለኛ</span>
                        </a>
                    </div>
                
                    <div class="menu-item">
                        <a href="{{ route('login') }}">
                            <span class="en">Login</span>
                            <span class="am hidden">ይግቡ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="create_account">
                            <span class="en">Create Account</span>
                            <span class="am hidden">አዲስ አካዉንት ይክፈቱ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <div class="language-switcher">
                            <label for="lang-toggle">Language:</label>
                            <select id="lang-toggle">
                                <option value="en">English</option>
                                <option value="am">አማርኛ</option>
                            </select>
                        </div>
                    </div>
                </nav>

            </header>
        </div>
    </div>
    <br><br>
    <img style="width: 100%; height:400px; margin-top:50px;" src="{{asset('assets/imgs/background.jpeg')}}">
    <div style="background-color: #F1F6F9;">
        @yield('content')
    </div>
    <script>
        const langToggle = document.getElementById('lang-toggle');
        const enText = document.querySelectorAll('.en');
        const amText = document.querySelectorAll('.am');

        langToggle.addEventListener('change', function() {
            const selectedLang = langToggle.value;
            if (selectedLang === 'en') {
                enText.forEach(function(text) {
                    text.classList.remove('hidden');
                });
                amText.forEach(function(text) {
                    text.classList.add('hidden');
                });
            } else if (selectedLang === 'am') {
                enText.forEach(function(text) {
                    text.classList.add('hidden');
                });
                amText.forEach(function(text) {
                    text.classList.remove('hidden');
                });
            }
        });
    </script>

    <script>
        $(".menu-toggle-btn").click(function() {
            $(this).toggleClass("fa-times");
            $(".navigation-menu").toggleClass("active");
        });
    </script>


</body>

</html>