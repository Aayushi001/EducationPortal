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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
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
                <ul class="nav navbar-nav navbar-left">

                        <li id="back"><a class="page-scroll" href="<?php echo e(url('/')); ?>">Back To Home</a></li>
                </ul>
            </div>
         </div>

    </nav>

<?php echo $__env->yieldContent('content'); ?>
</body>
</html>