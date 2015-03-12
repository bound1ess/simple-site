@extends('admin.dashboard')

@section('dashboard-body')
    <h3>{{ trans('messages.posts') }}</h3>

    @foreach ($posts as $post)
        @include('partials.post')
    @endforeach
@stop
