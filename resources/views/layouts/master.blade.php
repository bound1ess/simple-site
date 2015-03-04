<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Lang::get('messages.project-name') }}
            @stop
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.2/united/bootstrap.min.css">
        <style>
            body {
                padding-top: 30px;
                padding-bottom: 80px;
            }
            ul > li {
                font-size: 150%;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>{{ Lang::get('messages.project-name') }}</h1>
                <p class="lead">{{ Lang::get('messages.project-desc') }}</p>
                <p class="lead">{{ Lang::get('messages.important') }}: @yield('important')</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h2>{{ Lang::get('messages.navigation') }}</h2>
                    <hr>
                    @include('partials/menu')
                </div>
                <div class="col-lg-8">
                    <h2>
                        @section('navbar')
                            {{ Lang::get('messages.project-name') }} &raquo;
                        @stop
                    </h2>
                    @yield('body')
                </div>
            </div>
        </div>
        @yield('js')
    </body>
</html>
