@extends("layouts.discussionLayout")
@section("content")

 <div class="container" style="margin-top: 100px;">
 
 @if(Session::has("message"))
 <div class="alert alert-success row">
    <strong>SUCCESS</strong> {{Session::get("message")}}
  </div>
  @endif
  
	<div class="row">
		<div class="col-md-8">
			<form action="{{route('store')}}" method="POST">
				<label for="title" class="bold" style="font-size: 18px; margin-right : 10px;"> Title </label>
				<input type="text" name="title" id="ask" placeholder="What's your question? Be specific.">
				<br><br>
				<label for="description" class="bold" style="font-size: 18px; margin-right : 10px;"> Description </label><br>
				<textarea rows="14" name="description" id="description">
				</textarea>
				<br><br>
				<label for="category" class="bold" style="font-size: 18px; margin-right : 10px;"> Category </label><br>
				<select class="form-control" id="category" name="category">
					@foreach($categories as $category)
						<option > {{$category->name}}
							
						</option>
					@endforeach
				</select>
			
			<br><br>

				<input type="hidden" name="_token" value="{{ csrf_token()}}">
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
					
	</div>
	</div>	

<!-- JavaScripts -->
   
@endsection