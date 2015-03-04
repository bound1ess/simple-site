@extends('layouts.master')

@section('body')
    @if (count($childCategories) > 0)
        <h2>{{ Lang::get('messages.sub-categories') }}</h2>
        <hr>
        <ul class="list-unstyled">
            @foreach ($childCategories as $category)
                <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    @endif

    @if (count($posts) > 0)
        <h2>{{ Lang::get('messages.posts') }}</h2>
        <hr>
        <ul class="list-unstyled">
            @foreach ($posts as $post)
                <li><a href="/post/{{ $post->id }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    @endif
@stop
