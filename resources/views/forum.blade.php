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
						{{ $forumCount}} groups <br>
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
    <thead id="groupsTable-head">
      <tr>
        <th>GROUPS</th>
        <th>POSTS</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($categories as $category)

    	<tr>
        <td>{{$category->name}}</td>
        <td> 
           {{\App\Post::where('category', $category->name)->count()}}
        </td>
      </tr>

    	@endforeach
    	   
    </tbody>
  </table>

  	{!! $categories->render() !!}
  </div>
 
</div>

<!-- TABLE ENDS-->

<div class="container-fluid" id="links-strip">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<a href="#">
							<div class="col-md-12 box">
								<i class="fa fa-lightbulb-o fa-2x"></i>
								<br>Tests
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#">
							<div class="col-md-12 box">
							<i class="fa fa-bullhorn fa-2x"></i>
								<br>News
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#">
							<div class="col-md-12 box">
								<i class="fa fa-star-o fa-2x"></i>
								<br>Important Links
							</div>
						</a>
					</div>
				</div>
			</div>	
		</div>

<!-- CONTACT US SECTION STARTS -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <h2>Education Portal</h2>
            
                <p>Here we write about us.<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit.</p>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <h2 class="text-center">Quick Links</h2>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 col-sm-6 col-xs-6">
                         <ul>
                            <li><a href="#"> Courses</a></li>
                            <li><a href="#"> Courses</a></li>
                            <li><a href="#"> Courses</a></li>
                            <li><a href="#"> Courses</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-6">
                         <ul>
                            <li><a href="#"> FAQ</a></li>
                            <li><a href="#"> Terms</a></li>
                            <li><a href="#"> Courses</a></li>
                            <li><a href="#"> Courses</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <h2>Contact Us</h2>
                Noida<br>
                Uttar Pradesh, India<br><br>
                +919999999999<br>
                abc@gmail.com<br><br>
                
            </div>
        </div>
        
    </div>
</section>


@endsection
