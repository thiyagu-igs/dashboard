<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="public/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('public/css/bootstrap.min.css')}}" rel="stylesheet" />
 <link href="{{ URL::asset('public/css/jquery-ui.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('public/css/animate.min.css')}}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ URL::asset('public/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('public/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <script src="{{ URL::asset('public/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ URL::asset('public/img/sidebar-5.jpg')}}">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                   Admin
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{asset('/admin/') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="{{asset('/admin/booking') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Booking</p>
                    </a>
                </li>
                <li>
                    <a href="{{asset('/admin/changepass') }}">
                        <i class="pe-7s-user"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                
              
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        
                      
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li>
                            <a href="{{asset('/') }}logout">
                                <p>Logout</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
         <div class="content">
            <div class="container-fluid">
               @yield('content')
             </div>
        </div>

<footer class="footer">
            <div class="container-fluid">                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> 
                </p>
            </div>
        </footer>
    </div>
</div>
    <script src="{{ URL::asset('public/js/bootstrap.min.js')}}" type="text/javascript"></script>
   <script src="{{ URL::asset('public/js/jquery-ui.js')}}" type="text/javascript"></script>
</body>
</html>