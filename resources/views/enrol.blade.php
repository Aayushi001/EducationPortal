@extends('layouts.sidebar')
@section("content")   

<div id="menu">
  			<nav>
    			<h2><i class="fa fa-reorder"></i>All Categories</h2>
    			<ul>

    			@foreach($categories as $category)

            		<li>
                    <a href="#">{{ $category->name}}</a>
                    <h2>{{ $category->name}}</h2>
                    		
                    <ul>

                    	@foreach($category->subcat as $subcat)
               				<li >
                   			<a href= "#">{{ $subcat->name}}</a>
                                <h2>{{$subcat->name}}</h2>

                                <ul>
                                    @foreach($subcat->courses as $course)
                                    <li>
                                         
                                          <a href= "<?php echo 'course/' . $course->id ?>">{{ $course->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                   			</li>

                   
                  		@endforeach
                    </ul>
            		</li>

                @endforeach

    			</ul>
 			</nav>
 		</div>
   
<div class="container" style="margin:0;">
            <div class="row" style="">
                <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4 col-xs-6 col-xs-offset-6 ">

 			        <nav class="navbar navbar-default navbar-fixed-top" style= "margin-left: 365px; background-color: #fff;">
        		
                	<ul class="nav navbar-nav">

                		<li style="margin-top: 20px;">
                	 		<span>
                         	<input type="text" placeholder=" Search For Courses " class="search">
                     
                         	<button style= "margin-right:20px;" class="btn btn-lg btn-danger search-btn">Search</button>
                    		</span>
                		</li>
               
                 		<li><a href="{{ url('/') }}">Home</a></li>

                 		<li><a href="{{ url('/discussion') }}">Discussion</a></li>

                	    @if (Auth::guest())
                        <li id="lock-icon" ><a href="{{ url('/login') }}" ><i class="fa fa-lock"><span style="font-size: 20px; font-weight: bolder;"> Log in</span></i></a></li>
                    	@else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="borderless">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ url('/profile') }}" id="borderless-menu"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                                  <li><a href="{{ url('/settings') }}" id="borderless-menu"><i class="fa fa-btn fa-cog"></i>Settings</a></li>
                                <li><a href="{{ url('/logout') }}" id="borderless-menu"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    	@endif
                        
                	</ul>
                    </nav>
        	   </div>
            </div>  
<div class="row" style="position:relative;top:-500px">

 <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4 col-xs-6 col-xs-offset-6 ">
 
  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verify the Information here</h2>
  <form class="form-horizontal" role="form" action='{{route("trial")}}' method="post">
  
  <div class="form-group">
      <label class="control-label col-sm-2">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control"  value="{{Auth::user()->name}}" readonly>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control"  value="{{Auth::user()->email}}" readonly>
      </div>
    </div>
	
  <div class="form-group">
      <label class="control-label col-sm-2">Name of the Tutorial</label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control"  value="{{$title}}" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Teacher:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$teacher}}" name="teacher" readonly>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Fee Payment:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$fee}}" name="fee" readonly >
      </div>
    </div>
    
	&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="auth" style="font-size:15px;">Pls see whether the Information entered above is correct or not???</a>
	<p class="hidden" style="display:none">Click on the above link to go on the next page</p>
	<br>
	
	<div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default sub" rel="First click on the above link" disabled=true>Submit</button>
	
      </div>
    </div>
  </form>
</div>
<script>
	
$(document).ready(function(){
		
		$("a.auth").click(function(){
			$(".sub").prop("disabled",false);return false;
		}
		);
		$(".sub").mouseover(function(){
			$("p.hidden").show(1000,function(){
				
				$(".hidden").hide(3000);
			});
			
		});
	});

	</script>
</div>			
</div>


			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			




@endsection
       