

@if(isset($replies))
@foreach($replies as $reply)
<div style="height:30px;position:relative">
								<div class='col-md-9'><img src="{{URL::asset('public/images/student.jpg')}}" style="height: 30px; width: 30px; border-radius:100%;">
								
								{{ $reply->reply}}</div>
								
								<a class="btn btn-primary replyhere" href="#replybox{{$reply->comment_id}}" style="">Reply to the comment</a>
					
								
								<p style="text-align:right; color:grey; font-size:12px;">{{$reply->user}}<br> posted {{$reply->created_at->diffForHumans()}}</p>
							<br>
							
						
							</div><br><br><br><br>
							
				@endforeach			
@else 
	<div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">No Reply to the above comment</div>
      
    </div></div>
@endif