@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sets <a href="{{ url('/sets/create') }}" class="btn btn-primary btn-xs" title="Add New Set"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('sets.workex_id') }} </th><th> {{ trans('sets.weigth') }} </th><th> {{ trans('sets.reps') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($sets as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->workex_id }}</td><td>{{ $item->weigth }}</td><td>{{ $item->reps }}</td>
                    <td>
                        <a href="{{ url('/sets/' . $item->id) }}" class="btn btn-success btn-xs" title="View Set"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/sets/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Set"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/sets', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Set" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Set',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $sets->render() !!} </div>
    </div>

</div>
@endsection
