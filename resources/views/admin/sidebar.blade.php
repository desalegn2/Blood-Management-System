<aside class="main-sidebar sidebar-dark-primary elevation-4" style="color: #FF8B13;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="BBBMS" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BBBMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="color: #FF8B13;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/use')}}" class="img-circle elevation-2" alt="Admin Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">admin name</a>
            </div>
        </div>

        <!-- SidebarSearch Form 
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-regular fa-envelope-alt"></i>
                        <i class="fa fa-users fa-1x" aria-hidden="true"></i>

                        ADD
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add" class="nav-link active">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Add user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Add Blogs</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-regular fa-envelope-alt"></i>
                        <i class="fa fa-users fa-1x" aria-hidden="true"></i>

                        Manage Users
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="user" class="nav-link active">
                                <i class="fa fa-user-times" aria-hidden="true"></i>
                                <p>Block User</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="viewdonor" class="nav-link active">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Manage Donor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewnurse" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Manage Nurses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewtech" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Manage Lab Technician</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="addadmin" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewhi" class="nav-link">
                                <i class="fa fa-h-square" aria-hidden="true"></i>
                                <p>Manage Health Institute</p>
                            </a>
                        </li>
                    </ul>
                </li>

                </li>

                <li class="nav-item">
                    <a href="hospitalrequest" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">Hospital Request</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Stored Blood</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Distribute Blood</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class='fas fa-arrow-alt-circle-right' style='font-size:24px'></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>