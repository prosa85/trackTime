@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('flash_message'))
        <div class="alert alert-success }}">
            {!! session('flash_message') !!}
        </div>
    @endif
    <h1>Time Track <a href="{{ url('/timetrack/create') }}" class="btn btn-primary btn-xs" title="Add New Time"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>

        <div><form action="/file" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="sr-only" for="">File</label>
                <input type="file"  accept=".csv,.txt" class="form-control" name="csv" id="csv" placeholder="Input field">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form></div>

    <div class="table">
    @if(isset($week))
        <div><a href="/timetrack">Go back</a></div>
        <div class="text-danger">Showing results for week {{$week}} for user {{$user->name}} </div>
    @endif
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Week</th>
                    @if($user->role>1)
                        <th>User</th>
                    @endif
                    <th> Start </th><th> End </th><th>Hours</th><th v-if="showCommits">Commit</th> <th>Company</th><th @if($user->role>1) v-if="showCommits" @endif>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}

            @foreach($timetrack as $item)
                {{-- */$x++;/* --}}
                <tr>

                    <td><a href='/timetrack/week/{{ $item->week }}/user/{{$item->user->id}}'>{{ $item->week }}</a></td>
                    @if($user->role>1)
                        <td>{{ $item->user->name }}</td>
                    @endif

                    <td>{{ $item->start }}</td><td>{{ $item->end }}</td><td> {{$item->hours}} </td><td v-if="showCommits"> <a target="_BLANK" href="https://bitbucket.org/gordos_programming/dsl-laravel/commits/{{$item->commit}}">{{$item->commit}}</a> </td>
                    <td>{{ $item->companyName }}</td>
                    <td @if($user->role>1) v-if="showCommits" @endif>

                        <a href="{{ url('/timetrack/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Time"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/timetrack', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Time" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Time',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td>Total</td><td colspan="@if($user->role>1)5 @else 4 @endif" class="text-right">{{$sum}} </td><td></td>
                </tr>
            </tbody>
        </table>
        @if(Auth::user()->id==1)
        <div>Paycheck Total ${{ $total['total_in_dollars'] }}</div>
        <div>Paycheck Total hours {{ $total['total_hours_in_paycheck'] }}</div>
        @endif
        <div class="text-center">
                <div class="pagination"> {!! $timetrack->render() !!} </div>
        </div>
        @include('timetrack.createTime')
    </div>

</div>
@endsection
