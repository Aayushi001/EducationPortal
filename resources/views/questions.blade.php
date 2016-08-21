@extends('layouts.discussionLayout')

@section('content')

	<div class="container-fluid" id="strip">
	<div class="row">
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-md-2 strip-left">
						Discussion Forum
					</div>
					<div class="col-md-4 col-md-offset-6 strip-right">
						{{ $questionCount}} Questions <br>
						{{ $userCount }} users
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
	    		@foreach($questions as $question)

	    		<tr>
	        	<td style="padding-right:20px;"> <h4>{!! link_to_route('question.view', $question->description, [$question->id]) !!}<br>
	        	<small> asked {{ $question->created_at->diffForHumans()}}
	        	</small></h4><br>
	        	<p style="color: #f05f40; font-weight: bold;">
	        		@foreach($users as $user)
	        			@if($user->id == $question->user_id)
	        			{{ $user->name}}
	        			@endif
	        		@endforeach
	        	</p>
	        	</td>
	        	<td><h4> {{$question->title}}</h4></td>
	        	<td><h4> {{$question->category}}</h4></td>
	      		</tr>

	    		@endforeach
	    	   
	    	</tbody>
  		</table>

  	{!! $questions->render() !!}
  </div>
 
</div>

<!-- TABLE ENDS-->



@endsection