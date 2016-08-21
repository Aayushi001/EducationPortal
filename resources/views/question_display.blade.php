@extends('layouts.discussionLayout')

@section('content')
	
	<div class="container-fluid grey">
		<div class="container">
			<div class="row">
				<div class="panel question-box">
					<h2>{{$question->title}}</h2>
					<hr style="color: #f5f5f5;">
					<h4>{{ $question->description}}</h4>
					<h4><small>asked {{ $question->created_at->diffForHumans()}}</small></h4>
					{{\App\User::find($question->user_id)->name}}
					<ul class="list-unstyled list-inline" style="text-align:right;">	
						<li>
							{{\App\QuestionLikes::where('question_id', $question->id)->count()}} Likes
						</li>
						<li>
							{{\App\QuestionComment::where('question_id', $question->id)->count()}} Comments
						</li>
					</ul>
						
				
				</div>
			</div>
			<div class="row">	
				<ul class="list-unstyled list-inline">
					<li>
						
							{!! Form::open() !!}
							{!! Form::hidden('like_question', '$question->id') !!}
								<button type="submit" class="btn btn-info"><i class="fa fa-thumbs-up"></i> &nbsp;Like</button>
							{!! Form::close() !!}
						
						
					</li>
					<li>
						<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#view-comments-{{$question->id}}" aria-expanded="view-comments-{{$question->id}}" aria-controls="collapseExample"><i class="fa fa-comment-o"></i> &nbsp;Comments</button>	
					</li>
				</ul>
			</div>

			<div class=" row collapse" id="view-comments-{{$question->id}}">
				{!! Form::open() !!}
				{!! Form::hidden('comment_question', '$question->id') !!}
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" name="comment-text" id="comment-text" placeholder="Post a comment..">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-send-o"></i></button>
						</span>
					</div>
				</div>
				{!! Form::close() !!}

					@foreach($comments as $comment)
						@if($comment->question_id == $question->id)
							<div style="height:45px;">
								<img src="/images/student.jpg" style="height: 30px; width: 30px; border-radius:100%;">
								{{ $comment->comment}}
								
								<p style="text-align:right; color:grey; font-size:12px;">{{\App\User::find($comment->user_id)->name}}<br> posted {{$comment->created_at->diffForHumans()}}</p>
							</div>
								
						<hr>
						
						@endif
					@endforeach
				</div>
				
				
			<div class="row">
				<h3 style="color:#f05f40">Answers : [ {{\App\Answer::where('question_id', $question->id)->count()}} ]</h3>	
			
			</div>

			<div>
				@foreach($answers as $answer)
					@if($answer->question_id == $question->id)
					<h4>{{ $answer->answer}}</h4>
					<h3 style="text-align:right;"><small>answered by {{\App\User::find($answer->user_id)->name}}<br>{{$answer->created_at->diffForHumans()}} </small></h3>
					@endif
				@endforeach
			</div>

			<div class="row" id="view-answers-{{$question->id}}">
				{!! Form::open() !!}
				{!! Form::hidden('answer_question', '$question->id') !!}
				<div class="form-group">
						<textarea placeholder="Write your answer here..." class="form-control" name="answer-text" id="answer-text" rows="10">
						</textarea>
						
							<button class="btn btn-danger submit-btn" type="submit"><i class="fa fa-send-o"></i> &nbsp;Submit</button>
					
				</div>
				{!! Form::close() !!}>
			</div>


		</div>
		
	</div>

@endsection