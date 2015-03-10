@extends('layouts.admin')

@section('body')
    <div class="row">
        <div class="col-lg-2 well">
            <ul class="list-unstyled">
                <li><a href="/admin/dashboard">{{ trans('messages.main') }}</a></li>
                <li><a href="/admin/dashboard/posts">{{ trans('messages.posts') }}</a></li>
                <li>
                    <a href="/admin/dashboard/categories">
                        {{ trans('messages.categories') }}
                    </a>
                </li>
            </ul>
        </div>

        <!-- Create space between two rows. -->
        <div class="col-lg-1"></div>

        <div class="col-lg-9 well">
            Hello, world!
        </div>
    </div>

    <!-- Styling! -->
    <style>
        .row li {
            font-size: 150%;
        }
    </style>
@stop
