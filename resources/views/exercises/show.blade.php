@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Exercise {{ $exercise->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $exercise->id }}</td>
                </tr>
                <tr><th> {{ trans('exercises.name') }} </th><td> {{ $exercise->name }} </td></tr><tr><th> {{ trans('exercises.description') }} </th><td> {{ $exercise->description }} </td></tr><tr><th> {{ trans('exercises.image_id') }} </th><td> {{ $exercise->image_id }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('exercises/' . $exercise->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Exercise"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['exercises', $exercise->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Exercise',
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