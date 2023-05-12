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
            background: #245953;
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
                        <a href="{{url('/donor/profile',Auth::user()->id)}}" class="profile @if(Request::is('donor/profile*')) active @endif">
                            <span class="en">Profile</span>
                            <span class="am hidden">የግል ማህደር</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{url('/donor/home')}}" class="@if(Request::is('donor/home*')) active @endif">
                            <span class="en">Home</span>
                            <span class="am hidden">መነሻ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{url('/donor/news')}}" class="@if(Request::is('donor/news*')) active @endif">
                            <span class="en">News</span>
                            <span class="am hidden">አዲስ መረጃ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{url('/donor/information')}}" class="@if(Request::is('donor/information*')) active @endif">
                            <span class="en">Blood Bank Information</span>
                            <span class="am hidden">የደም ባንክ መረጃ</span>
                        </a>
                    </div>
                    <div class="dropdown @if(Request::is('donor/reservation*')) active @endif">
                        <a href="" class="dropbtn">
                            <span class="en">Reservation</span>
                            <span class="am hidden">ቀጠሮ</span>
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ url('/donor/reservationform') }}">
                                <span class="en">Send Reservation</span>
                                <span class="am hidden">ቀጠሮ መያዝ</span>
                            </a>
                            <a href="{{ url('/donor/reservationhistory', Auth::user()->id) }}">
                                <span class="en">View Reservation Status</span>
                                <span class="am hidden">የቀጠሮውን ሁኔታ ይመልከቱ</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="{{url('/donor/asks')}}" class="@if(Request::is('donor/asks*')) active @endif">
                            <span class="en">Chatbot</span>
                            <span class="am hidden">ለመጠየቅ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{url('/donor/refer',Auth::user()->id)}}" class="@if(Request::is('donor/refer*')) active @endif">
                            <span class="en">Refer Others</span>
                            <span class="am hidden">ሌሎችን ጋብዝ</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="@if(Request::is('logout')) active @endif">
                            <span class="en">Logout</span>
                            <span class="am hidden">መዉጣት</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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
    <div style="background-color: #F1F6F9;">
        @yield('content')
    </div>

    @include('donor.footer')

    </style>

    <script>
        const langToggle = document.getElementById('lang-toggle');
        const enText = document.querySelectorAll('.en');
        const amText = document.querySelectorAll('.am');

        // Retrieve the language from cookies or local storage
        let selectedLang = localStorage.getItem('selectedLang') || 'en';
        langToggle.value = selectedLang;

        // Update the display properties of the English and Amharic text
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

        // Add an event listener to the language toggle select element
        langToggle.addEventListener('change', function() {
            selectedLang = langToggle.value;

            // Store the selected language in cookies or local storage
            localStorage.setItem('selectedLang', selectedLang);

            // Update the display properties of the English and Amharic text based on the selected language
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