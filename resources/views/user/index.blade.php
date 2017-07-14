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
	</div>
@endsection