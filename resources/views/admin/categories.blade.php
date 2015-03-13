@extends('admin.dashboard')

@section('dashboard-body')
    <h3>{{ trans('messages.categories') }}</h3>

    @include('partials.category-list')
@stop
