<h1>Create New Time Track</h1>
    <hr/>

    {!! Form::open(['url' => '/timetrack', 'class' => 'form-horizontal']) !!}

             

            
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('start', trans('start'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('start', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('image_id') ? 'has-error' : ''}}">
                {!! Form::label('image_id', trans('end'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('end', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}