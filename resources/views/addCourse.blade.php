@extends('layouts.teacherPanelLayout')

@section('content')
	<div class="container" style="margin-top:80px;">
		<div class="row">
			<h2 style="text-align:center;">ADD FILES</h2>
			{!! Form::open(array('route' => array('handleUpload', $id), 'files'=>true)) !!}
			
			
				{!! Form::file('file') !!}
				{!! Form::token() !!}
				{!! Form::submit('Upload') !!}
				<br>
				<label for="description" class="bold labelForAddTutorial"> Description </label><br>
				<textarea rows="4" name="description" placeholder="Describe about the content of file." style="width:100%;">
				</textarea>
				<input type="hidden" name="_token" value="{{ csrf_token()}}">
				<button class="btn-danger" type="submit" id="add-course-btn" name="submit">Add Course</button>
			{!! Form::close() !!}

			@if(\App\UploadedFile::where('tutorial_id', $id))
				<table class="table  groupsTable">
	    			<thead id="groupsTable-head">
	      				<tr>
			        		<th>File Name</th>
			        		<th>File Description</th>
			        		<th>Delete File</th>
	      				</tr>
	    			</thead>
	    			<tbody>
				    	@foreach($files as $file)
				    		@if($file->tutorial_id == $id)
					    		<tr>
							        <td>{{$file->file_name}}</td>
							        <td>{{$file->description}}</td>
							        <td><button>DELETE <i class="fa fa-remove"></i></button></td>
					      		</tr>
				      		@endif
				    	@endforeach    	   
	    			</tbody>
	  			</table>
		@endif

		</div>
		
	</div>
	
@endsection