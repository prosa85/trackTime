@extends('layouts.app')

@section('content')
<div class="container">
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
            <label for="">Tracking Hours</label>
            <input type="text" class="form-control" name="tracking_hours" id="role" placeholder="Input field" value="{{$user->tracking_hours }}">
        </div>
		<div class="form-group">
			<label for="">Role</label>
			<input type="text" class="form-control" name="role" id="role" placeholder="Input field" value="{{$user->role }}">
		</div>


		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<div class="container"><br>
	<table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Week</th>
                    @if($user->role>1)
                        <th>Usuario</th>
                    @endif
                    <th> Start </th><th> End </th><th>Hours</th> <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	{{-- */$x=0;/* --}}

            @foreach($times as $item)
                {{-- */$x++;/* --}}
                <tr>

                    <td><a href='/timetrack/week/{{ $item->week }}/user/{{$item->user->id}}'>{{ $item->week }}</a></td>
                    @if($user->role>1)
                        <td>{{ $item->user->name }}</td>
                    @endif

                    <td>{{ $item->start }}</td><td>{{ $item->end }}</td><td> {{$item->hours}} </td>
                    <td>

                        <a href="{{ url('/timetrack/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Time"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/timetrack', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Time" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Time',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td>Total</td><td colspan="@if($user->role>1)4 @else 3 @endif" class="text-right">{{$sum}} </td><td></td>
                </tr>
            </tbody>
        </table>
</div>>
@endsection