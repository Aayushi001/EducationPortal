<?php $__env->startSection('content'); ?>

	<div class="container-fluid" id="strip">
	<div class="row">
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-md-2 strip-left">
						Discussion Forum
					</div>
					<div class="col-md-4 col-md-offset-6 strip-right">
						<?php echo e($questionCount); ?> Questions <br>
						<?php echo e($userCount); ?> users
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

	<div class="container">
		<input type="text" placeholder=" What are you looking for? " class="search-questions">
	</div>

	<div class="container">
  		<div class="table-responsive">
  		<table class="table  groupsTable">
	    	<tbody>
	    		<?php foreach($questions as $question): ?>

	    		<tr>
	        	<td style="padding-right:20px;"> <h4><?php echo link_to_route('question.view', $question->description, [$question->id]); ?><br>
	        	<small> asked <?php echo e($question->created_at->diffForHumans()); ?>

	        	</small></h4><br>
	        	<p style="color: #f05f40; font-weight: bold;">
	        		<?php foreach($users as $user): ?>
	        			<?php if($user->id == $question->user_id): ?>
	        			<?php echo e($user->name); ?>

	        			<?php endif; ?>
	        		<?php endforeach; ?>
	        	</p>
	        	</td>
	        	<td><h4> <?php echo e($question->title); ?></h4></td>
	        	<td><h4> <?php echo e($question->category); ?></h4></td>
	      		</tr>

	    		<?php endforeach; ?>
	    	   
	    	</tbody>
  		</table>

  	<?php echo $questions->render(); ?>

  </div>
 
</div>

<!-- TABLE ENDS-->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.discussionLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>