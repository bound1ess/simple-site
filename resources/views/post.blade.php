@extends('layouts.master')

@section('body')
    <h2>{{ $post->title }}</h2>
    <hr>
    <p class="lead">{!! $post->contents !!}</p>
@stop
