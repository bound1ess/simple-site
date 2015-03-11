<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Config::get('main-page.name') }}
            @show
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.2/readable/bootstrap.min.css">
        <style>
            body {
                padding-top: 30px;
                padding-bottom: 80px;
                background: url('/bg.png');
            }

            ul > li {
                font-size: 150%;
            }

            #head {
                /* background: url('/jumbotron_bg.png'); */
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="container">
            <div class="jumbotron" id="head">
                <h1><a href="/">{{ Config::get('main-page.name') }}</a></h1>
                <p class="lead">{{ Config::get('main-page.slogan') }}</p>
                <p class="lead">
                    {{ trans('messages.important') }}:
                    @include('partials/important')
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h2>{{ trans('messages.navigation') }}</h2>
                    @include('partials/menu')
                    <ul type="circle">
                        @if ( ! Auth::check())
                            <li>
                                <a href="/auth/login">
                                    {{ trans('messages.login') }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="/admin/dashboard">
                                    {{ trans('messages.dashboard') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-8">
                    <h2>
                        @section('navbar')
                            {{ trans('messages.project-name') }} &raquo;
                        @stop
                    </h2>
                    @yield('body')
                </div>
            </div>
        </div>
        @yield('js')
    </body>
</html>
