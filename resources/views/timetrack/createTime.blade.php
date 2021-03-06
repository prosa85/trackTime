<h1>Create New Time Entry</h1>
    <hr/>

    {!! Form::open(['url' => '/timetrack', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('start', trans('start'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-3">
                    {!! Form::date('startdate', \Carbon\Carbon::now('America/new_york'), ['class' => 'form-control', 'required'=>'true']) !!}
                    {!! $errors->first('startdate', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::time('start', \Carbon\Carbon::now('America/new_york'), ['class' => 'form-control']) !!}
                    {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('image_id') ? 'has-error' : ''}}">
                {!! Form::label('image_id', trans('end'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-3">
                    {!! Form::date('enddate', \Carbon\Carbon::now('America/new_york'), ['class' => 'form-control']) !!}
                    {!! $errors->first('startdate', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::time('end', \Carbon\Carbon::now('America/new_york'), ['class' => 'form-control']) !!}
                    {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('image_id') ? 'has-error' : ''}}">
                {!! Form::label('commit', trans('Git Commit'), ['class' => 'col-sm-3 control-label']) !!}
                @if(Auth::user()->id != 1)
                <div class="col-sm-6">
                    {!! Form::text('commit', null, ['class' => 'form-control', 'required'=>'true']) !!}
                    {!! $errors->first('commit', '<p class="help-block">:message</p>') !!}
                </div>

                @else
                <div class="col-sm-6">
                    {!! Form::text('commit', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('commit', '<p class="help-block">:message</p>') !!}
                </div>
                @endif

            </div>
            <div class="form-group">
                {!! Form::label('Company', trans('Company id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('company', ['1' => 'DSL', '2' => 'Altruist'], 2, ['class' => 'form-control']) !!}
                    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}