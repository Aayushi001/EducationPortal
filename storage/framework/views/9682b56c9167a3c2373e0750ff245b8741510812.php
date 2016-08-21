<!DOCTYPE html>
<html>
<head>
	<title> test </title>
	
	<?php echo e(HTML::style('css/font-awesome.css')); ?>

	    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<?php echo e(HTML::style('css/bootstrap.min.css')); ?>

	<?php echo e(HTML::script('js/jquery.min.js')); ?>

	

	<script src="//oss.maxcdn.com/libs/modernizr/2.6.2/modernizr.min.js"></script>		


 	<?php echo e(HTML::style('css/jquery.multilevelpushmenu.css')); ?>

 	<?php echo e(HTML::style('css/style.css')); ?>

 	<?php echo e(HTML::script('js/bootstrap.js')); ?>

    <?php echo e(HTML::script('js/jquery.multilevelpushmenu.min.js')); ?>




	<script src="jquery.multilevelpushmenu.min.js"></script>
	<script>  $(document).ready(function(){
        $(' #menu').multilevelpushmenu();
    });</script>
</head>
<body class="white-bg">
   




<?php echo $__env->yieldContent('content'); ?>

</body>
</html>