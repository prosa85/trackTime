@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Favorite {{ $favorite->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $favorite->id }}</td>
                </tr>
                <tr><th> {{ trans('favorites.user_id') }} </th><td> {{ $favorite->user_id }} </td></tr><tr><th> {{ trans('favorites.exercise_id') }} </th><td> {{ $favorite->exercise_id }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('favorites/' . $favorite->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Favorite"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['favorites', $favorite->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Favorite',
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