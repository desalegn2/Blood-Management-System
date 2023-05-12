<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Navbar Example</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"
      integrity="sha512-+OwV7k0hWwpjlO7HLLyRUcPA9zePMgPz8udVH39MkZo0bZ67My6fCp6weh/JLTyC/jWyXjRpdAJxliQhCX0q+g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
        #navItem{
            color: white;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(30, 144, 255);">

      <div class="container-fluid">
        <a class="navbar-brand"  href="#"><img src="{{asset('assets/imgs/bblogo2.jpg')}}" style="border-radius: 50%;" width="40px; height:;40px;"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" id ="navItem" aria-current="page" href="#">Home</a>
              <span class="am hidden">መነሻ</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" id ="navItem"  href="about">About</a>
              <span class="am hidden">ስለኛ</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" id ="navItem"  href="{{ route('login') }}">Login</a>
              <span class="am hidden">ይግቡ</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" id ="navItem"  href="create_account">Create Account</a>
              <span class="am hidden">አዲስ አካዉንት ይክፈቱ</span>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<img style="width: 100%; height:400px;" src="{{asset('assets/imgs/background.jpeg')}}">
    <!-- Bootstrap JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"
      integrity="sha512-gwt+z8yO7J1aMndpGzeJxn38eZzJ9AEKj+IznLxKgvw8L1vJsdnC5oc1K/w+ROz98JtH9XrKl+x+qBLb5d5uew=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    
    <script>
      // Show the collapsed navigation items when the toggle button is clicked
      var navbarCollapse = document.querySelector('.navbar-collapse');
      document.querySelector('.navbar-toggler').addEventListener('click', function () {
        navbarCollapse.classList.toggle('show');
      });
    </script>
  </body>
</html>
