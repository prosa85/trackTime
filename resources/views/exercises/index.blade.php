@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Exercises <a href="{{ url('/exercises/create') }}" class="btn btn-primary btn-xs" title="Add New Exercise"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('exercises.name') }} </th><th> {{ trans('exercises.description') }} </th><th> {{ trans('exercises.image_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($exercises as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->description }}</td><td>{{ $item->image_id }}</td>
                    <td>
                        <a href="{{ url('/exercises/' . $item->id) }}" class="btn btn-success btn-xs" title="View Exercise"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/exercises/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Exercise"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/exercises', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Exercise" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Exercise',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $exercises->render() !!} </div>
    </div>

</div>
@endsection
