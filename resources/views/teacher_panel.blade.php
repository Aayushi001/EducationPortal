@extends('layouts.teacherPanelLayout')

@section('content')
	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<img src="/images/student.jpg" class="profilePicture">
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 style="text-align: center; color:#f05f40; font-weight: bold">{{$user->name}}</h3>
				<p style="text-align:justify">{{$user->about_me}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-danger" data-toggle="collapse" data-target="#addNewTutorial" style="width:100%;" ><i class="fa fa-plus"></i>&nbsp; ADD A NEW TUTORIAL</button>
			</div>
		</div>
		<div class="row collapse" id="addNewTutorial">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel" style="margin-top:30px; padding: 20px; text-align:justify">
					{!! Form::open(array('url' => '/addTutorial')) !!}
						<label for="name" class="bold labelForAddTutorial"> Name Of The Tutorial </label>
						<input name="name" style="width:100%;">
						<br><br>
						<label for="description" class="bold labelForAddTutorial"> Description </label><br>
						<textarea rows="6" name="description" placeholder="Describe about the course." style="width:100%;">
						</textarea>
						<br><br>
						<label for="level" class="bold labelForAddTutorial" style="display:inline;"> Level </label>
						<select id="level" name="level" style="height:25px;">
							<option>Beginner</option>
							<option>Intermediate</option>
							<option>Advanced</option>
						</select>
						<label for="language" class="bold labelForAddTutorial" style="display:inline; padding-left:10px;"> Language </label>
						<select id="language" name="language" style="height:25px;">
							<option>English</option>
							<option>Hindi</option>
						</select>
						<br><br>
						<label for="course" class="bold labelForAddTutorial"> Course </label><br>
						<select class="form-control" id="course" name="course">
							<option>Select-a-course-name-for-the-tutorial</option>
							@foreach($courses as $course)
							<option>{{$course->name}}</option>
							@endforeach
						</select>
						<br><br>	
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<button class="btn-danger" type="submit" id="add-tutorial-btn" name="submit">SUBMIT</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<h2>Recently Added Tutorials</h2>
	  <div class="table-responsive">
	  	<table class="table  groupsTable">
	    	<thead id="groupsTable-head">
	      		<tr>
	        		<th>Tutorial Name</th>
	        		<th>Course Name</th>
	        		<th>Level</th>
	        		<th>Language</th>
	        		<th>No. Of Files</th>
	        		<th>Update Files</th>
	      		</tr>
	    </thead>
	    <tbody>
	    	@foreach($tutorials as $tutorial)
	    		@if($tutorial->teacher == $user->name)
		    		<tr>
				        <td>{{$tutorial->title}}</td>
				        <td> 
				           {{\App\Course::find($tutorial->course_id)->name}}
				        </td>
				        <td>{{$tutorial->level}}</td>
				        <td>{{$tutorial->language}}</td>
				        <td>{{0}}</td>
				        <td>
				        	<ul class="list-unstyled list-inline">
				        		<li><a href="{!! route('handleUpload', $tutorial->id) !!}" class="btn btn-primary">ADD<i class="fa fa-plus"></i></a></li>
				        		<li><button>DELETE <i class="fa fa-remove"></i></button></li>
				        	</ul>
				        </td>
		      		</tr>
	      		@endif
	    	@endforeach    	   
	    </tbody>
	  </table>
	 </div>
	 <div class="row collapse" id="uploadFile{{$tutorial->id}}">
	 		{!! Form::open(array('url' => '/handleUpload', 'files'=>true)) !!}
	 			{!! Form::file('file') !!}
				{!! Form::token() !!}
				{!! Form::submit('Upload') !!}
				<br>
				<input type="hidden" name="_token" value="{{ csrf_token()}}">
			{!! Form::close() !!}
	 </div>
</div>

<!-- TABLE ENDS-->

	
@endsection