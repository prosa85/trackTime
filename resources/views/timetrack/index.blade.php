@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Time Track <a href="{{ url('/timetrack/create') }}" class="btn btn-primary btn-xs" title="Add New Time"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    @if($user->role ==3)
        <div><form action="/file" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="sr-only" for="">File</label>
                <input type="file"  accept=".csv,.txt" class="form-control" name="csv" id="csv" placeholder="Input field">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form></div>
    @endif
    <div class="table">
    @if(isset($week))
        <div><a href="/timetrack">Go back</a></div>
        <div class="text-danger">Showing results for week {{$week}} for user {{$user->name}} </div>
    @endif
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

            @foreach($timetrack as $item)
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
        <div class="text-center">
                <div class="pagination"> {!! $timetrack->render() !!} </div>
        </div>
        @include('timetrack.createTime')
    </div>

</div>
@endsection
