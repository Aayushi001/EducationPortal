<?php $__env->startSection("content"); ?>

 <div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-8">
			<form action="<?php echo e(route('store')); ?>" method="POST">
				<label for="title" class="bold" style="font-size: 18px; margin-right : 10px;"> Title </label>
				<input type="text" name="title" id="ask" placeholder="What's your question? Be specific.">
				<br><br>
				<label for="description" class="bold" style="font-size: 18px; margin-right : 10px;"> Description </label><br>
				<textarea rows="14" name="description" id="description">
				</textarea>
				<br><br>
				<label for="category" class="bold" style="font-size: 18px; margin-right : 10px;"> Category </label><br>
				<select class="form-control" id="category" name="category">
					<?php foreach($categories as $category): ?>
						<option > <?php echo e($category->name); ?>

							
						</option>
					<?php endforeach; ?>
				</select>
			
			<br><br>

				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<button class="btn-danger" type="submit" id="post-btn" name="submit">Post Question</button>
			</form>

		</div>
		<div class="col-md-4">
			<div class="panel" id="instruction-box">
				<h1><u>Instructions</u></h1>
				<h3>Share your research.</h3>
				<p>Tell us what you found (on this site or elsewhere) and why it didn’t meet your needs. This demonstrates that you’ve taken the time to try to help yourself, it saves us from reiterating obvious answers, and above all, it helps you get a more specific and relevant answer!</p>

				<h3>Be specific</h3>
				<p>If you ask a vague question, you’ll get a vague answer. But if you give us details and context, we can provide a useful, relevant answer.</p>

				<h3>Keep an open mind</h3>
				<p>The answer to your question may not always be the one you wanted, but that doesn’t mean it is wrong. When in doubt, ask people to cite their sources, or to explain how/where they learned something.</p>
				<br>
				<a href="#"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> Ask for help</a>
				

			</div>
		</div>

		<?php if(Session::has('message')): ?>
<p class="alert"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
					
	</div>
	</div>	

<!-- JavaScripts -->
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.discussionLayout", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>