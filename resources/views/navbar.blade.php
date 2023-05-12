<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media (max-width: 991.98px) {
            .navbar-nav {
                margin: 0 auto;
            }

            .navbar-nav>.nav-item {
                display: block;
                text-align: center;
                margin-bottom: 10px;
            }

            .navbar-nav>.nav-item:last-child {
                margin-bottom: 0;
            }

            .navbar-nav .nav-link {
                padding: 10px;
                border-radius: 5px;
                margin: 0 auto;
                width: 100%;
            }
        }
    </style>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(30, 144, 255);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{asset('assets/imgs/bblogo2.jpg')}}" style="border-radius: 50%;" width="40px;" height="40px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" id="navItem" aria-current="page" href="#">Home</a>
          <span class="am hidden">መነሻ</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="navItem" href="about">About</a>
          <span class="am hidden">ስለኛ</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="navItem" href="{{ route('login') }}">Login</a>
          <span class="am hidden">ይግቡ</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="navItem" href="create_account">Create Account</a>
          <span class="am hidden">አዲስ አካዉንት ይክፈቱ</span>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <script>
        const langToggle = document.getElementById('lang-toggle');
        const enText = document.querySelectorAll('#navbarNav .nav-link');
        const amText = document.querySelectorAll('#navbarNav .am');

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
</body>

</html>