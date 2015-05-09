@extends('layouts.admin')

@section('body')
    <div class="row">
        <div class="col-lg-2 well">
            <ul class="list-unstyled">
                {!! smart_link('/admin/dashboard', trans('messages.main')) !!}
                {!! smart_link('/admin/posts', trans('messages.posts')) !!}
                {!! smart_link('/admin/categories', trans('messages.categories')) !!}
                {!! smart_link('/admin/upload', trans('messages.upload')) !!}
            </ul>
        </div>

        <!-- Create space between two rows. -->
        <div class="col-lg-1"></div>

        <div class="col-lg-9 well">
            @yield('dashboard-body')
        </div>
    </div>

    <!-- Styling! -->
    <style>
        .row li {
            font-size: 150%;
        }
    </style>
@stop
