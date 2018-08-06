@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>id</th><th>name</th><th>email</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td><a href="/users/{{$user->id}}"> {{$user->id}} </a></td><td>{{ $user->name }}</td><td>{{ $user->email }}</td>
				</tr>
			@endforeach 
			</tbody>
		</table>
		@if( Auth::user()->role==3 )
			This is the create form
			<form action="/users" method="POST" role="form">
				{{ csrf_field() }}
				{{ method_field('POST') }}
				<legend>User</legend>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Input Name" >
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" name="email" id="role" placeholder="Input Email">
				</div>
				<div class="form-group">
					<label for="">Role</label>
					<input type="text" class="form-control" name="role" id="role" placeholder="Role">
				</div>
				

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		@endif
	</div>
@endsection