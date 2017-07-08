@extends('layouts.app')

@section('content')
<div class="container">

    @include('timetrack.createTime')

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection