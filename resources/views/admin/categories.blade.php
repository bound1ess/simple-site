@extends('admin.dashboard')

@section('dashboard-body')
    <h3>
        {{ trans('messages.categories') }}
        <a href="/categories/new" class="btn btn-primary">{{ trans('messages.new') }}</a>
    </h3>

    @include('partials.category-list')
@stop
