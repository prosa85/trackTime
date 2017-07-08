@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Time Track <a href="{{ url('/timetrack/create') }}" class="btn btn-primary btn-xs" title="Add New Time"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
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
                    
                    <td>{{ $x }}</td>
                    <td>{{ $item->user->name }}</td>
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
            </tbody>
        </table>
        @include('timetrack.createTime')
        <div class="pagination"> {!! $timetrack->render() !!} </div>
    </div>

</div>
@endsection
