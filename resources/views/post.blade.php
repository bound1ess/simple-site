@extends('layouts.master')

@section('body')
    <h2>{{ $post->title }}</h2>

    <p class="lead">
        {!! $post->contents !!}
    </p>

    @if (Auth::check())
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-lg btn-primary">
            {{ trans('messages.edit') }}
        </a>
    @endif
@stop
