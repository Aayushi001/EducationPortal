<?php $__env->startSection('content'); ?>
	<div class="container" style="margin-top:80px;">
		<div class="row">
			<h2 style="text-align:center;">ADD FILES</h2>
			<?php echo Form::open(array('route' => array('handleUpload', $id), 'files'=>true)); ?>

			
			
				<?php echo Form::file('file'); ?>

				<?php echo Form::token(); ?>

				<?php echo Form::submit('Upload'); ?>

				<br>
				<label for="description" class="bold labelForAddTutorial"> Description </label><br>
				<textarea rows="4" name="description" placeholder="Describe about the content of file." style="width:100%;">
				</textarea>
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<button class="btn-danger" type="submit" id="add-course-btn" name="submit">Add Course</button>
			<?php echo Form::close(); ?>


			<?php if(\App\UploadedFile::where('tutorial_id', $id)): ?>
				<table class="table  groupsTable">
	    			<thead id="groupsTable-head">
	      				<tr>
			        		<th>File Name</th>
			        		<th>File Description</th>
			        		<th>Delete File</th>
	      				</tr>
	    			</thead>
	    			<tbody>
				    	<?php foreach($files as $file): ?>
				    		<?php if($file->tutorial_id == $id): ?>
					    		<tr>
							        <td><?php echo e($file->file_name); ?></td>
							        <td><?php echo e($file->description); ?></td>
							        <td><button>DELETE <i class="fa fa-remove"></i></button></td>
					      		</tr>
				      		<?php endif; ?>
				    	<?php endforeach; ?>    	   
	    			</tbody>
	  			</table>
		<?php endif; ?>

		</div>
		
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacherPanelLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>