<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Basic</title>

       <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js')}}"></script>
       <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                @if(Session::has('user_session'))
                <span> {{Session::get('user_session') }}</span><a href="{{asset('/') }}logout">logout</a>
                @endif
            </nav>
        </div>

        @yield('content')
    </body>
</html>