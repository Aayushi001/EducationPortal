@extends('layouts.teacherPanelLayout')

@section('content')
<div class="table-responsive">
	<table class="table" style="margin-top:80px;">
        <thead>
	        <th>Name</th>
	        <th>E-Mail</th>
	        <th>User</th>
	        <th>Teacher</th>
	        <th>Admin</th>
	        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('admin.assign') }}" method="post">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Teacher') ? 'checked' : '' }} name="role_teacher"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><button type="submit">Assign Roles</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
	
@endsection