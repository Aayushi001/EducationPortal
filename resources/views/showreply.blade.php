


@foreach($replies as $reply)

<div style="height:45px;" class="commentbox">
							
								<img src="{{url::asset('/images/student.jpg')}}" style="height: 30px; width: 30px; border-radius:100%;">
								{{ $reply->reply}}
								
								<p style="text-align:right; color:grey; font-size:12px;">{{$reply->user}}<br> posted {{$reply->created_at}}</p>
							</div>
							<a href="" class="allreply" rel="{{$reply->comment->question_comment_id}}">Reply to the comment</a>
							
							
							
							
							@endforeach