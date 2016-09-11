@extends('layouts.teacherPanelLayout')

@section('content')

	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="#course" data-toggle="collapse"><h3 class="center">ADD A NEW COURSE</h3></a>
				<div id="course" class="row collapse">
					<div class="col-md-12">
						<div class="panel" style="margin-top:30px; padding: 20px; text-align:justify">
							{!! Form::open(array('url' => '/admin/addCourse')) !!}
								<label for="name" class="bold labelForAddCourse"> Name Of The Course </label>
								<input name="name" style="width:100%;height:35px">
								<br><br>
								<label for="subcategory" class="bold labelForAddSubcategory" style="display:inline;"> Subcategory </label>
								<select id="subcategory" name="subcategory" class="form-control" style="height:35px;">
									@foreach($subcategories as $subcategory)
										<option>{{$subcategory->name}}</option>
									@endforeach
								</select>
								<br><br>
								<input type="hidden" name="_token" value="{{ csrf_token()}}">
								<button class="btn-danger" type="submit" id="add-course-btn" name="submit">SUBMIT</button>
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div><!-- Add Course Ends-->

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="#subcat" data-toggle="collapse"><h3 class="center">ADD A NEW SUBCATEGORY</h3></a>
				<div id="subcat" class="row collapse">
					<div class="col-md-12">
						<div class="panel" style="margin-top:30px; padding: 20px; text-align:justify">
							{!! Form::open(array('url' => '/admin/addSubcategory')) !!}
								<label for="name" class="bold labelForAddCourse"> Name Of The Subcategory </label>
								<input name="name" style="width:100%;height:35px">
								<br><br>
								<label for="category" class="bold labelForAddCategory" style="display:inline;"> Category </label>
								<select id="category" name="category" class="form-control" style="height:35px;">
									@foreach($categories as $category)
										<option>{{$category->name}}</option>
									@endforeach
								</select>
								<br><br>
								<input type="hidden" name="_token" value="{{ csrf_token()}}">
								<button class="btn-danger" type="submit" id="add-course-btn" name="submit">SUBMIT</button>
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="#cat" data-toggle="collapse"><h3 class="center">ADD A NEW CATEGORY</h3></a>
				<div id="cat" class="row collapse">
					<div class="col-md-12">
						<div class="panel" style="margin-top:30px; padding: 20px; text-align:justify">
							{!! Form::open(array('url' => '/admin/addCategory')) !!}
								<label for="name" class="bold labelForAddCourse"> Name Of The Category </label>
								<input name="name" style="width:100%;height:35px">
								<br><br>
								<input type="hidden" name="_token" value="{{ csrf_token()}}">
								<button class="btn-danger" type="submit" id="add-course-btn" name="submit">SUBMIT</button>
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection