@extends('layouts.app')

@section('content')
<form action="/users/{{$user->id}}" method="POST" role="form">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<legend>User</legend>


	
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Input field" value="{{$user->name }}">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" name="email" id="role" placeholder="Input field" value="{{$user->email }}">
	</div>
	<div class="form-group">
		<label for="">Role</label>
		<input type="text" class="form-control" name="role" id="role" placeholder="Input field" value="{{$user->role }}">
	</div>
	

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection