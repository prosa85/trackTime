@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Favorite {{ $favorite->id }}</h1>

    {!! Form::model($favorite, [
        'method' => 'PATCH',
        'url' => ['/favorites', $favorite->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', trans('favorites.user_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('exercise_id') ? 'has-error' : ''}}">
                {!! Form::label('exercise_id', trans('favorites.exercise_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('exercise_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('exercise_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection