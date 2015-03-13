@extends('admin.dashboard')

@section('dashboard-body')
    <h3>
        {{ trans('messages.posts') }}
        <a href="/posts/new" class="btn btn-primary">{{ trans('messages.new') }}</a>
    </h3>

    @foreach ($posts as $post)
        @include('partials.post')
    @endforeach
@stop
