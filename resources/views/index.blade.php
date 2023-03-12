<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Additional custom styles */
        /* Custom sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 48px 0 0;
            /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        /* Style page content */
        .main {
            padding: 20px;
            margin-left: 160px;
            /* Same as the width of the sidebar */
        }

        @media (max-width: 768px) {
            .sidebar {
                padding: 48px 0 0;
                position: fixed;
                top: 0;
                left: -100%;
                z-index: 100;
                transition: all 0.5s ease-in-out;
                background-color: #343a40;
            }

            .sidebar.active {
                left: 0;
            }

            .sidebar-sticky {
                position: relative;
                top: 0;
                height: auto;
                padding-top: .5rem;
                overflow-x: hidden;
                overflow-y: auto;
                /* Scrollable contents if viewport is shorter than content. */
            }

            .main {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Products
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <h1>Responsive Sidebar Example</h1>
                <p>Resize the browser window to see the effect.</p>
            </main>
        </div>
    </div>

</body>

</html>