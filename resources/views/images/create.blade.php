@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Image</h1>
    <hr/>

    {!! Form::open(['url' => '/images', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('image_path') ? 'has-error' : ''}}">
                {!! Form::label('image_path', trans('images.image_path'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('image_path', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}
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