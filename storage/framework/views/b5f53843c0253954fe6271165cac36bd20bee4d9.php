<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Education Portal</title>

    <!-- Fonts -->
    <?php echo e(HTML::style('css/font-awesome.css')); ?>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <?php echo e(HTML::style('css/bootstrap.min.css')); ?>

    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
    <?php /* <link href="<?php echo e(elixir('public/css/style.css')); ?>" rel="stylesheet"> */ ?>
    <?php echo e(HTML::style('css/style.css')); ?>

    <?php echo e(HTML::script('js/bootstrap.js')); ?>

    <?php echo e(HTML::script('js/scrollreveal.js')); ?>


   
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
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
                <a class="navbar-brand  page-scroll" href="<?php echo e(url('/')); ?>">
                    Education portal
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                        <li><a class="page-scroll" href="#home">Home</a></li>
                        <li><a class="page-scroll" href="#services">Why Us</a></li>
                        <li><a href="<?php echo e(url('/discussion')); ?>">Discussion</a></li>
                        <li><a class="page-scroll" href="#contact">Contact</a></li>
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>

                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="borderless">
                                 <i class="fa fa-lock"><span style="font-size: 20px; font-weight: bolder;"> Log in</span></i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/login')); ?>" id="borderless-menu"><i class="fa fa-btn fa-user"></i>Student</a></li>
                                <li><a href="<?php echo e(url('/login')); ?>" id="borderless-menu"><i class="fa fa-btn fa-cog"></i>Teacher</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" id="borderless">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                 <li><a href="<?php echo e(url('/profile')); ?>" id="borderless-menu"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                                  <li><a href="<?php echo e(url('/settings')); ?>" id="borderless-menu"><i class="fa fa-btn fa-cog"></i>Settings</a></li>
                                <li><a href="<?php echo e(url('/logout')); ?>" id="borderless-menu"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
