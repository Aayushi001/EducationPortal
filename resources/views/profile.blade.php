@extends('layouts.app')
@section('content')


<nav class="navbar navbar-default" style="position:relative;top:80px;background-color:#80ffcc">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#myid">Profile</a></li>
      <li><a href="{{route('profilecourses')}}">Courses</a></li>
      <li><a href="{{route('describe')}}">Tutdescriptionpage</a></li>
    </ul>
  
</nav></div><br><br><br><br>
<?php 

if(isset($contact))
echo $contact;
?>


<div class="container" id="myid">
<div class="row">
<div class="pack col-md-4 col-md-offset-1" style="height:300px;background-color:white">
<div class="row"><br><div class="col-md-6" style="font-size:30px">Profile</div><div class="col-md-5"></div>

</div>
<div class="row">

<div class="col-md-3">
<i class="fa fa-user" aria-hidden="true" style="font-size:100px"></i><br>

<br>
<a href="" data-toggle="modal" data-target="#pro">Update the profile pic</a>
 <div class="modal fade" id="pro" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Profile</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
<div class="col-md-8 col-md-offset-1">
<br>
<p style='font-size:20px'>{{Auth::user()->name}}</p>
<p>Joined {{Auth::user()->created_at->diffForHumans()}}</p>
<hr style="height:3px;background-color:green">
<p>{{Auth::user()->email}}</p>
</div>

</div>
</div>



<div class="col-md-1"></div>


<div class="pack col-md-4" style="height:300px;background-color:white;">

<a href=""><i class="fa fa-plus" aria-hidden="true" style="position:absolute;right:10px;top:28px;font-size:30px;backgroud-color:gray"></i></a>
<div class="row">
<div class="col-md-5" style="font-size:30px;position:relative;top:20px" >Address<br></div><div class="col-md-7"></div>
</div>
@foreach($contacts as $contact)
<div class="row">


<div class="col-md-7" ><br><br><p><?php  


if(isset($contact->address))
	echo $contact->address;

else echo "NO ADDRESS FOUND";
?></p>
<p><a href="" data-toggle="modal" data-target="#pro">Update</a> | <a href="">Remove</a></p></div><div class="col-md-5"></div></div>

@endforeach
<div class="col-md-2"></div>

</div>
<br><br>
<div class="row" style="position:relative;">

<div class="col-md-4 col-md-offset-1" >

<div class="row" style="background-color:white">
<a href=""><i class="fa fa-plus" aria-hidden="true" style="position:absolute;right:10px;top:28px;font-size:30px;backgroud-color:gray"></i></a>
<div class="row" style="padding:10px">
<div class="col-md-5" style="font-size:30px;position:relative;top:20px">Email Address<br></div><div class="col-md-7"></div></div>

<div class="row" style="padding:10px;">




<div class="col-md-7" ><br><br><p>Your primary email:- {{Auth::user()->email}}</p>
<p><a href="" data-toggle="modal" data-target="#pro">Update</a></p></div><div class="col-md-5"></div>
</div>


<div class="row" style="padding:10px">




<div class="col-md-7" ><br><br><p>Your Secondary email:- {{Auth::user()->email}}</p>
<p><a href="" data-toggle="modal" data-target="#pro" >Update</a> | <a href="">Remove</a></p></div><div class="col-md-5"></div></div>


</div>
</div>
<div class="col-md-1"></div>
<div class="col-md-4" >

<div class="row" style="background-color:white">
<a href=""><i class="fa fa-plus" aria-hidden="true" style="position:absolute;right:10px;top:28px;font-size:30px;backgroud-color:gray"></i></a>
<div class="row" style="padding:10px">
<div class="col-md-5" style="font-size:30px;position:relative;top:20px" >Contact Details<br></div><div class="col-md-7"></div></div>
@foreach($contacts as $contact)
<div class="row" style="padding:10px">




<div class="col-md-7" ><p>Telephone:- <?php  


if(isset($contact->telephone))
	echo $contact->telephone;

else echo "NO TELEPHONE FOUND";
?></p>
<p><a href="" data-toggle="modal" data-target="#pro">Update</a></p></div><div class="col-md-5"></div></div>
@endforeach

@foreach($contacts as $contact)
<div class="row" style="padding:10px">




<div class="col-md-7" ><p>Mobile:-<?php  


if(isset($contact->mobile))
	echo $contact->mobile;

else echo "NO MOBILE FOUND";
?></p>
<p><a href="" data-toggle="modal" data-target="#pro">Update</a></p></div><div class="col-md-5"></div></div>
@endforeach

</div>
</div>
</div>
</div>
<br>
<hr style="height:2px;background-color:red"><br><br>


@endsection
