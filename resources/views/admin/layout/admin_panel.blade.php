<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!doctype html>
<html lang="en">

<head>
    <title>Admin-Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                put the logo
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                ASTU File Sharing
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">school</i>
                        <p>School</p>
                    </a>
                </li>
                <!-- your sidebar here -->
                <li class="nav-item active  ">
                    <a class="nav-link" href="#" style="background-color: #3C4858">
                        <i class="material-icons">school</i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="#" style="background-color: #00acc1">
                        <i class="material-icons">school</i>
                        <p>Section</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
    {{--modfication starts here--}}
    <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="material-icons">notifications</i> Notifications
                            </a>
                        </li>
                        <!-- your navbar here -->

                    </ul>

                    <div>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        {{--modfication ends here--}}


        {{--7777777777777777777777 START CONTENTS HERE 777777777777777777777--}}

        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('content')
            </div>
        </div>


        {{--7777777777777777777777 END CONTENTS HERE 777777777777777777777--}}
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    , made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
                <!-- your footer here -->
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
