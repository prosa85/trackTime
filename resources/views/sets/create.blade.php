@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Set</h1>
    <hr/>

    {!! Form::open(['url' => '/sets', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('workex_id') ? 'has-error' : ''}}">
                {!! Form::label('workex_id', trans('sets.workex_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('workex_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('workex_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('weigth') ? 'has-error' : ''}}">
                {!! Form::label('weigth', trans('sets.weigth'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('weigth', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('weigth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reps') ? 'has-error' : ''}}">
                {!! Form::label('reps', trans('sets.reps'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('reps', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('reps', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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