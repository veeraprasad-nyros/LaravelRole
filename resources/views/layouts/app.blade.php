<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"-->
    <!-- <link href="./assets/fontawesome/css/font-awesome.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/font-awesome.css') }}" >
    <!-- <link href="./assets/Lato/Lato.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('assets/Lato/Lato.css') }}" >
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="./assets/bootstrap3.3.6/css/bootstrap.min.css" > -->
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap3.3.6/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap3.3.6/css/custom.css') }}">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="{{ URL::asset('assets/bootstrap3.3.6/js/bootstrap.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/bootstrap3.3.6/js/custom.js') }}" ></script>
    
</head>
<body id="app-layout" >
    <nav class="navbar navbar-default navbar-static-top ">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/login') }}">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}">
                                <i class="fa fa-registered" aria-hidden="true"></i>&nbsp;Register
                            </a>
                        </li>
                    @else
                        @role('admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span id='dashboard'>
                                    <i class="fa fa-btn fa-user"></i>Admin
                                </span>
                                <span class="caret"></span>
                            </a>
                                              
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/admin') }}">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        @role('company')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span id='dashboard'>
                                    <i class="fa fa-btn fa-user"></i>company
                                </span>
                                <span class="caret"></span>
                            </a>
                                              
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/company') }}">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                        </i>Dashboard
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        @role('member')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span id='dashboard'>
                                    <i class="fa fa-btn fa-user"></i>member
                                </span>
                                <span class="caret"></span>
                            </a>
                                              
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-btn fa-user"></i>dropdown</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('others')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span id='dashboard'>
                                    <i class="fa fa-btn fa-user"></i>others
                                </span>
                                <span class="caret"></span>
                            </a>
                                              
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-btn fa-user"></i>dropdown</a></li>
                            </ul>
                        </li>
                        @endrole
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;
                                <span id='username'>
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/profile') }}">
                                        <i class="fa fa-user-md" aria-hidden="true"></i>&nbsp;&nbsp;
                                        <span> Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}">
                                        <i class="fa fa-btn fa-sign-out"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
        </div>

    </nav>
    @yield('content')

    <footer>
      <div class="container text text-muted">
        <div class="col-md-8">
            &copy; right to all    
        </div>
        <div class="col-md-4" style="text-align:right">
            Developed by Laravel
        </div>
      </div>
    </footer>
    <!-- JavaScripts -->
    <!-- <script src="./assets/jquery/jquery-2.2.3.min.js" ></script> -->
    <!-- <script src="{{ URL::asset('assets/jquery/jquery-2.2.3.min.js') }}" ></script> -->
    <!-- <script src="./assets/bootstrap3.3.6/js/bootstrap.min.js" ></script> -->
    <!-- <script src="{{ URL::asset('assets/bootstrap3.3.6/js/bootstrap.min.js') }}" ></script> -->

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
     <!--  <script src="{{ URL::asset('assets/jquery/jquery-2.2.3.min.js') }}" ></script> -->
        
</body>
</html>
