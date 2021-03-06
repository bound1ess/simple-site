<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Config::get('main-page.name') }}
            @show
        </title>
        <link rel="icon" href="/favicon.ico">
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

            @font-face {
                font-family: customfont;
                src: url('/font.ttf');
            }

            #head h1 {
                /*color: #4582ec !important*/;
                font-family: customfont;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="container">
            <div class="jumbotron" id="head">
                <h1><a href="/">{{ Config::get('main-page.name') }}</a></h1>
                <p class="lead">{{ Config::get('main-page.slogan') }}</p>

                @if (count($importantPosts) > 0)
                    <p class="lead">
                        {{ trans('messages.important') }} ({{ count($importantPosts) }}):
                        @include('partials/important')
                    </p>
                @endif
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
