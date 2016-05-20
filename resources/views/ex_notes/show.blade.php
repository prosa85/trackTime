@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ex_note {{ $ex_note->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $ex_note->id }}</td>
                </tr>
                <tr><th> {{ trans('ex_notes.user_id') }} </th><td> {{ $ex_note->user_id }} </td></tr><tr><th> {{ trans('ex_notes.exercise_id') }} </th><td> {{ $ex_note->exercise_id }} </td></tr><tr><th> {{ trans('ex_notes.body') }} </th><td> {{ $ex_note->body }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('ex_notes/' . $ex_note->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ex_note"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['ex_notes', $ex_note->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ex_note',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection