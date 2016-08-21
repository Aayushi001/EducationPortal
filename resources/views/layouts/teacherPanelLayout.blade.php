<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Education Portal</title>

    <!-- Fonts -->
	 
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
	<link href="{{URL::asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" >
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" >

    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
</head>
<body class="white-bg">
      <nav class="navbar navbar-default navbar-fixed-top">
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
                <a class="navbar-brand  page-scroll" href="{{ url('/') }}">
                    Education portal
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                        <li><a href="{{route('questions') }}">Discussion</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())

                       
                                <li><a href="{{ url('/login') }}" id="borderless-menu"><i class="fa fa-btn fa-lock"></i>Login</a></li>
                    @else
                        <li><a href="#">Notifications</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" id="borderless">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{ url('/settings') }}" id="borderless-menu"><i class="fa fa-btn fa-cog"></i>Settings</a></li>
                                <li><a href="{{ url('/logout') }}" id="borderless-menu"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
	