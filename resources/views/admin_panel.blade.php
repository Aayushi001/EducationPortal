@extends('layouts.teacherPanelLayout')

@section('content')

            <div class="container-fluid">
                 <div class="side-menu">
                 <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>
                    <li><a href="#"><i class="fa fa-check-square-o"></i><span> Enrolled Courses</span></a></li>
                     <li><a href="{{ url('/admin/add') }}"><i class="fa fa-plus"></i><span> Add</span></a></li>
                    <li><a href="{{ url('/admin/assign-roles') }}"><i class="fa fa-user"></i><span> Assign Roles</span></a></li>
                    <li><a href="forms.html"><i class="fa fa-bullhorn"></i><span> Update News</span></a></li>
                    <li><a href="forms.html"><i class="fa fa-credit-card"></i><span> Manage Payments</span></a></li>  
                </ul>
                <!--sidebar nav end-->
                </div>

                <div style="margin-top:70px;margin-left:300px;">
                <div class="container">
                    <div class="row">
                         <div class="col-md-3">
                            <div class="panel">
                                 <div style="padding:10px; background-color:#88bce4; color:#3991db; height: 40px; font-size:18px;" class="panel-heading">Total Users</div>
                                <div class="panel-body" style="background-color: #3991db;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                    <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <div class="panel">
                                <div style="padding:10px; background-color:#e2e386; color:#acaf54; height: 40px; font-size:18px;" class="panel-heading">Tutorials</div>
                                <div class="panel-body" style="background-color: #d9db38;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                    <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <div class="panel">
                                <div style="padding:10px; background-color:#b988e3; color:#9139db; height: 40px; font-size:18px;" class="panel-heading">Teachers</div>
                                <div class="panel-body" style="background-color: #9139db;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>
                    </div>

                    <div class="row">    
                        <div class="col-md-3">
                            <div class="panel">
                                 <div style="padding:10px; background-color:#e4a28a; color:#af6d57; height: 40px; font-size:18px;" class="panel-heading">Total Sales</div>
                                <div class="panel-body" style="background-color: #db6738;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                    <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <div class="panel">
                                 <div style="padding:10px; background-color:#9a9a9a; color:#555555; height: 40px; font-size:18px;" class="panel-heading">Posts</div>
                                <div class="panel-body" style="background-color: #555555;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                    <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <div class="panel">
                                 <div style="padding:10px; background-color:#e2bd88; color:#af8a55; height: 40px; font-size:18px;" class="panel-heading">T</div>
                                <div class="panel-body" style="background-color: #da9838;color: #fff;height: 130px; padding:30px; font-size:38px;">
                                    <i class="fa fa-users fa-2x" style="float:left;"></i><span style="font-size:52px;">&nbsp;{{$usersCount}}</span>
                                </div>
                            </div>   
                        </div>
                    </div>

                </div>        
                </div>
            
                </div>
                
                   
            </div>

               
@endsection
