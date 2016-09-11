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
						<li class="likecount">
							<span class="likecount">{{$likecount}}</span> Likes
						</li>
						<li>
								<span class="commentcount">{{$commentcount}}</span> Comments
						</li>
					</ul>
						
				
				</div>
			</div>
			<div class="row">	
				<ul class="list-unstyled list-inline">
					<li>
						
						
								<button type="submit" class="btn btn-info like"><i class="fa fa-thumbs-up"></i> &nbsp;Like</button>
							
						<script>
						
						$(document).ready(function(){
							
				$(".like").click(function(){
					

var url="{{route('ajaxlike')}}";
							var i={{$question->id}};
							
							$.ajax({type:"POST",
							url:url,
							data:{id:i},
							success:function(data){
								$("span.likecount").text(data["count"]);
							
							}
							
							
						});


					
			
				});
				
$(".comment").click(function(evt){
	if($('.typecomment').val()=="")
		return false;
	
	else{
	evt.preventDefault();

var ur="{{route('ajaxcomment')}}";
							var i={{$question->id}};
							
							$.ajax({type:"POST",
							url:ur,
							data:{id:i,comment:$('.typecomment').val()},
							success:function(data){
								$("span.commentcount").text(data["count"]);
								$("#view-comments-{{$question->id}}").hide(100,function(){
									
									$(this).show(1000,function(){
										
										
								var t="";
									t+='<div style="height:45px;" class="commentbox">'+"<b>Your Latest Comment:--</b>"+data['comment']+"<span style='color:blue'>(Refresh the page to see full comments)</span>"+'<p style="text-align:right; color:grey; font-size:12px;">'+data['name']+'<br> posted '+data['created']+'</p>'+
							'</div>'+
							
						'<hr>'+
						
			'<div class="id'+data['id'] +'"></div>'+
			'<div class="replybox"></div>';
							
										$(t).prependTo(".showcomment");
										


									});
									
										


									
									
								});
							
							}
							
							
						});
						
	}


			return false;		
			
});

$("a.allreply").click(function(evt){
	evt.preventDefault();
	var i=$(this).attr("rel");
	$.ajax({
		
		type:"POST",
		url:'{{route("ajaxreplies")}}',
		data:{id:i},
		success:function(data)
		{$(".id"+i).html(data);
		
		$(".replybox"+i).show(1000);
		}
		
		
	});
	


	
});



	
		});
						</script>
						<script>
						
						$(document).ready(function(){
							$(".sendreply").click(function(evt){ 
							
							
	
							evt.preventDefault();
	var t=$(this).attr('rel');var repl=$('.replytxt'+t).val();var name='{{Auth::user()->name}}';
	if(repl=="")
		return false;
	
	$.ajax({
		
		
		type:"POST",url: '{!!route("ajaxsendreply")!!}',
		data:{id:t,reply:repl,user:name},
		success:function(data){
			
	$(".id"+t).html(data);
	$('.replytxt'+t).val("");
		}
		
	});
	
	
	
	

});
							
						});
					
						</script>
						
					</li>
			<li class="put"></li>
					<li>
						<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#view-comments-{{$question->id}}" aria-expanded="view-comments-{{$question->id}}" aria-controls="collapseExample"><i class="fa fa-comment-o comment"></i> &nbsp;Comments</button>	
					</li>
				</ul>
			</div>

			<div class=" row collapse" id="view-comments-{{$question->id}}">
				<form>
				
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control typecomment" name="comment-text" id="comment-text" placeholder="Post a comment.." required>
						<span class="input-group-btn">
							<button class="btn btn-default comment" type="submit"><i class="fa fa-send-o"></i></button>
						</span>
					</div>
				</div>
				</form>
<div class="showcomment">
					@foreach($comments as $comment)
					
							<div style="height:45px;" class="commentbox">
							
								<img src="{{URL::asset('public/images/student.jpg')}}" style="height: 30px; width: 30px; border-radius:100%;">
								{{ $comment->comment}}
								
								<p style="text-align:right; color:grey; font-size:12px;">{{\App\User::find($comment->user_id)->name}}<br> posted {{$comment->created_at->diffForHumans()}}</p>
							</div>
							<a href="" class="allreply" rel="{{$comment->id}}">Click here to see all the replies</a>
							
						<hr>
						<div class="replybox{{$comment->id}}" id="#replybox{{$comment->id}}" style="display:none;position:relative;bottom:30px" >
						<label>Reply to the comment</label>
						<textarea class="replytxt{{$comment->id}}" style="width:500px;height:50px;position:relative;top:20px" required></textarea>
						<a href="" class="sendreply" rel="{{$comment->id}}">Reply to the comment</a>
						</div>
			<div class="id{{$comment->id}}"></div>
			
					@endforeach
			</div>	</div>
				
			























			
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
