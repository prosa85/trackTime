@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Posts <a href="{{ url('/posts/create') }}" class="btn btn-primary pull-right btn-sm">Add New Post</a></h1><small>User {{ Auth::user()->name }}</small>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ trans('Id') }}</th><th>{{ trans('Body') }}</th><th>{{ trans('posts.image_id') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                
                <tr>
                    
                    <td><a href="{{ url('posts', $item->id) }}">{{ $item->id }}</a></td><td>{{ $item->body }}</td><td>{{ $item->image_id }}</td>
                    <td>
                        <a href="{{ url('/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/posts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                

            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $posts->render() !!} </div>
    </div>

</div>
@endsection
