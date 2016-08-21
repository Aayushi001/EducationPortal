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
                   			<a href= "#"><?php echo e($subcat->name); ?></a>
                                <h2><?php echo e($subcat->name); ?></h2>

                                <ul>
                                    <?php foreach($subcat->courses as $course): ?>
                                    <li>
                                         
                                          <a href= "<?php echo 'course/' . $course->id ?>"><?php echo e($course->name); ?></a>
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
        
            	 <div class="container tutorials-panel">
        
            	<div class="row">
            	 	<div class="col-md-9 col-md-offset-3">
	            		<div class="dropdown">
	  						<button class="btn dropdown-toggle dropdown-btn " type="button" data-toggle="dropdown">Level
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
								<form method="post">       
								   <li><a href="#" onclick="<?php echo e($tutorials = \App\Tutorial::where('level', '=', 'Beginner')->orderBy('id', 'DESC')->get()); ?>"> Beginner</a>
								  </li>
								   <li>
								   <a href="#" onclick="<?php echo e($tutorials = \App\Tutorial::where('level', '=', 'Intermediate')->orderBy('id', 'DESC')->get()); ?>"> Intermediate
								   </a>
								  
									</li>
								   <li>
								   <a href="#" onclick="<?php echo e($tutorials = \App\Tutorial::where('level', '=', 'Beginner')->orderBy('id', 'DESC')->get()); ?>"> Advanced
								   </a>
								  
									</li>
								</form>
								</ul>

						</div>

						<div class="dropdown">
	  						<button class="btn dropdown-btn dropdown-toggle" type="button" data-toggle="dropdown">Language
								<span class="caret"></span></button>
								<ul class="dropdown-menu" role="">
								   <li><a href="#">English</a></li>
								   <li><a href="#">Hindi</a></li>
								</ul>
						</div>
				

					<div class="dropdown">
  						<button class="btn dropdown-toggle dropdown-btn" type="button" data-toggle="dropdown">Price
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
							   <li><a href="#">Low to High</a></li>
							   <li><a href="#">High to Low</a></li>
	
							</ul>
					</div>
            	</div>
            </div>
                <?php foreach($tutorials as $tutorial): ?>
                <div class="row">
	                <div class="col-md-9 col-md-offset-3">
	                    <div class="panel tutorial-panel">
	                         <img src="data:image/png;base64,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">
	                        <h4 id="heading"><?php echo e($tutorial->title); ?> <br> <small><?php echo e($tutorial->teacher); ?></small></h4>
	                         <h4 id="fee">Rs. <?php echo e($tutorial->fee); ?></h4>
	                        <p><?php echo e($tutorial->description); ?></p>
	                        <button class="btn btn-danger">Enroll Now</button>

	                	</div>
	                </div>
                </div>
             
                <?php endforeach; ?>
        
        
            </div>

        </div>

       
			

	

 



        





















<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>