<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Sidebar with Navigation Links and Icons</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;

        }

        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100%;
            background-color: #333;
            padding: 20px;
            transition: all 0.3s ease-in-out;
            z-index: 999;
            color: #fff;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar-header h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
            display: block;
            transition: all 0.3s ease-in-out;
        }

        .sidebar .nav-link:hover {
            background-color: #555;
        }

        .toggle-btn {
            position: relative;


            font-size: 24px;
            color: #fff;
            background-color: #333;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s ease-in-out;
        }

        .toggle-btn:hover {
            background-color: #555;
        }

        .close-btn {
            font-size: 24px;
            color: #333;
            cursor: pointer;
            border: none;
            background-color: transparent;
            outline: none;
        }

        .nav-links {
            margin-top: 50px;
            list-style: none;
        }

        .nav-links li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .nav-links li a {
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-links li a i {
            margin-right: 10px;
        }

        .content {
            background-color: #f8f9fa;
            padding: 20px;
            margin-left: 0;
            /* initial margin */
            transition: margin-left 0.3s ease-in-out;
            /* added transition */
        }

        .content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .open-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #fff;
            background-color: #333;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 999;
        }

        @media (min-width: 992px) {
            .sidebar {
                left: 0;
            }

            .content {
                margin-left: 300px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Sidebar -->
    <div class="sidebar">

        <div class="sidebar-header">
            <button class="toggle-btn open-btn">
                <i class="fas fa-bars"></i>
            </button>

        </div>

        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-envelope"></i>
                    Messages
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bell"></i>
                    Notifications
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question"></i>
                    Help
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="content">
        <h1>Responsive Sidebar with Navigation Links and Icons</h1>
        <p>Click on the button to open the navigation sidebar.</p>
        <!-- <button class="open-btn">Open Sidebar</button> -->
    </div>
    <!-- Bootstrap JS and Fontawesome JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        // const openBtn = document.querySelector('.open-btn');
        // const closeBtn = document.querySelector('.close-btn');
        // const sidebar = document.querySelector('.sidebar');

        // openBtn.addEventListener('click', () => {
        //     sidebar.style.left = '0';
        // });

        // closeBtn.addEventListener('click', () => {
        //     sidebar.style.left = '-300px';
        // });
        const toggleBtn = document.querySelector('.toggle-btn');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');

        toggleBtn.addEventListener('click', () => {
            if (sidebar.style.left === '-300px') {
                sidebar.style.left = '0';
                toggleBtn.classList.replace('open-btn', 'close-btn');
                toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
                mainContent.style.marginLeft = '300px'; /* added line */
            } else {
                sidebar.style.left = '-300px';
                toggleBtn.classList.replace('close-btn', 'open-btn');
                toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
                mainContent.style.marginLeft = '0'; /* added line */
            }
        });
    </script>
</body>

</html>