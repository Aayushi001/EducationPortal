<?php $__env->startSection('content'); ?>



		<div id="menu">
  			<nav>
    			<h2><i class="fa fa-reorder"></i>All Categories</h2>
    			<ul>

    			<?php foreach($categories as $category): ?>

            		<li>
                    <a href="#"><?php echo e($category->name); ?></a>
                    <h2><?php echo e($category->name); ?></h2>
                    		
                    <ul>

                    	<?php foreach($category->subcat as $subcat): ?>
               				<li >
                   			<a href="#"><?php echo e($subcat->name); ?></a>
                                <h2><?php echo e($subcat->name); ?></h2>

                                <ul>
                                    <?php foreach($subcat->courses as $course): ?>
                                    <li>
                                          
                                          <a href="<?php echo e(route('course', $course->id )); ?>"><?php echo e($course->name); ?></a>
                                    
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                   			</li>

                   
                  		<?php endforeach; ?>
                    </ul>
            		</li>

                <?php endforeach; ?>

    			</ul>
 			</nav>
 		</div>
   

		<div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4 col-xs-6 col-xs-offset-6 ">

 			        <nav class="navbar navbar-default navbar-fixed-top" style= "margin-left: 365px; background-color: #fff;">
        		
                	<ul class="nav navbar-nav">

                		<li style="margin-top: 20px;">
                	 		<span>
                         	<input type="text" placeholder=" Search For Courses " class="search">
                     
                         	<button style= "margin-right:20px;" class="btn btn-lg btn-danger search-btn">Search</button>
                    		</span>
                		</li>
               
                 		<li><a href="<?php echo e(url('/')); ?>">Home</a></li>

                 		<li><a href="<?php echo e(url('/discussion')); ?>">Discussion</a></li>

                	    <?php if(Auth::guest()): ?>
                        <li id="lock-icon" ><a href="<?php echo e(url('/login')); ?>" ><i class="fa fa-lock"><span style="font-size: 20px; font-weight: bolder;"> Log in</span></i></a></li>
                    	<?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="borderless">
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
                    </nav>
        	   </div>
            </div>       
        </div>

       
            
        </div>


			

	

 



        





















<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>