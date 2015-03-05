@extends('layouts.master')

@section('body')
    <p class="lead">{{ Config::get('main-page.description') }}</p>
    <address><strong>{{ Config::get('main-page.address') }}</strong></address>

    <hr>

    @foreach (Config::get('main-page.maintainers') as $maintainer)
        <p>{{ $maintainer['name'] }}
            (<strong>{{ $maintainer['phone'] }}</strong>,
            <i>{{ $maintainer['email'] }}</i>)
        </p>
    @endforeach
@stop
