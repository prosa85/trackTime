@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Set {{ $set->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $set->id }}</td>
                </tr>
                <tr><th> {{ trans('sets.workex_id') }} </th><td> {{ $set->workex_id }} </td></tr><tr><th> {{ trans('sets.weigth') }} </th><td> {{ $set->weigth }} </td></tr><tr><th> {{ trans('sets.reps') }} </th><td> {{ $set->reps }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('sets/' . $set->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Set"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['sets', $set->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Set',
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