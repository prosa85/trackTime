@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ex_notes <a href="{{ url('/ex_notes/create') }}" class="btn btn-primary btn-xs" title="Add New Ex_note"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('ex_notes.user_id') }} </th><th> {{ trans('ex_notes.exercise_id') }} </th><th> {{ trans('ex_notes.body') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($ex_notes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->user_id }}</td><td>{{ $item->exercise_id }}</td><td>{{ $item->body }}</td>
                    <td>
                        <a href="{{ url('/ex_notes/' . $item->id) }}" class="btn btn-success btn-xs" title="View Ex_note"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/ex_notes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ex_note"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/ex_notes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Ex_note" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ex_note',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $ex_notes->render() !!} </div>
    </div>

</div>
@endsection
