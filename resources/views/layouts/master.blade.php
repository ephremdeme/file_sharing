<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href={{ asset("css/app.css") }}>
    @yield('specificCSS')


    <title>AdminLTE 3 | Starter</title>
    <style>
        .card.card-cascade .view.gradient-card-header {
            padding: 1.1rem 1rem;
        }

        .card.card-cascade .view {
            box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
        }

    </style>
    @yield('specificCSS')


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                @auth
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="profile" class="nav-link">Profile</a>
                </li>
                @endauth


                <li class="nav-item d-none d-sm-inline-block">
                    <a href="contact" class="nav-link">Contact</a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">FSP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset(' img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/files" class="nav-link">
                                <i class=" fa fa-file nav-icon" aria-hidden="true"></i>

                                <p>
                                    File Management

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="/users" class="nav-link">
                                <i class=" fas fa-users fa-2x nav-icon"></i>
                                <p>
                                    User Management
                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="/users" class="nav-link">
                                <i class=" fa fa-chalkboard-teacher fa-2x nav-icon" aria-hidden="true"></i>

                                {{-- <i class=" fas fa-users fa-2x"></i> --}}
                                <p>
                                    Instructor Management
                                    <i class="right fa fa-angle-left"></i>
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/instructors" class="nav-link active">
                                        <i class="fa fa-home nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/instructors/import_teaches"  class="nav-link">
                                        <i class="fa fa-file-import nav-icon"></i>
                                        <p>Import Teaches</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/instructors/create" class="nav-link">
                                        <i class="fa fa-file-import nav-icon"></i>
                                        <p>Import Instructors</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/students" class="nav-link">
                                <i class=" fa fa-user-graduate fa-2x nav-icon" aria-hidden="true"></i>

                                {{-- <i class=" fas fa-users fa-2x"></i> --}}
                                <p>
                                    Student Management
                                    <i class="right fa fa-angle-left"></i>
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/students" class="nav-link active">
                                        <i class="fa fa-home nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/students/import_takes" class="nav-link ">
                                        <i class="fa fa-file-import nav-icon"></i>
                                        <p>Import Takes</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/students/create" class="nav-link">
                                        <i class="fa fa-file-import nav-icon"></i>
                                        <p>Import Students</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    @yield('content_header')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    {{-- <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">Student Management Page</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Student Page</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row --> --}}
                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                ASTU FILE SHARING PLATFORM
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019 <a href="http://www.astu.edu.et">ASTU</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Modal -->




    <!--./Modal -->

    <script src={{ asset("js/app.js") }}></script>

    @yield('specificJS')
</body>

</html>
