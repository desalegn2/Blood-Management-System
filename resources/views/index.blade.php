<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .menu {
      position: relative;
    }

    .spanish-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
    }

    .language-switcher {
      margin-top: 20px;
    }

    .language-switcher button {
      font-size: 16px;
      border: none;
      background-color: transparent;
      cursor: pointer;
      margin-right: 10px;
      padding: 0;
    }

    .language-switcher button.active {
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .spanish-menu {
        position: static;
        display: block;
        border: none;
        padding: 0;
        margin-top: 10px;
      }
    }
  </style>

</head>

<body>
  <div class="container">
    <div class="menu">
      <ul class="english-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
      <ul class="spanish-menu">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contáctenos</a></li>
        <li><a href="#">Preguntas frecuentes</a></li>
        <li><a href="#">Política de privacidad</a></li>
      </ul>
    </div>
    <div class="language-switcher">
      <button class="english-button active">English</button>
      <button class="spanish-button">Español</button>
    </div>
  </div>

  <script>
  const englishButton = document.querySelector('.english-button');
  const spanishButton = document.querySelector('.spanish-button');
  const englishMenu = document.querySelector('.english-menu');
  const spanishMenu = document.querySelector('.spanish-menu');

  englishButton.addEventListener('click', function() {
    englishButton.classList.add('active');
    spanishButton.classList.remove('active');
    englishMenu.style.display = 'block';
    spanishMenu.style.display = 'none';
  });

  spanishButton.addEventListener('click', function() {
    englishButton.classList.remove('active');
    spanishButton.classList.add('active');
    englishMenu.style.display = 'none';
    spanishMenu.style.display = 'block';
  });
</script>
</body>

</html>