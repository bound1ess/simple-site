@extends('layouts.master')

@section('body')
    <h2>{{ $post->title }}</h2>
    <p class="lead">{{ $post->contents }}</p>
@stop
