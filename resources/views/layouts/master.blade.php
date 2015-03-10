<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Lang::get('messages.project-name') }}
            @show
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.2/flatly/bootstrap.min.css">
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
                <h1><a href="/">{{ Lang::get('messages.project-name') }}</a></h1>
                <p class="lead">{{ Lang::get('messages.project-desc') }}</p>
                <p class="lead">
                    {{ Lang::get('messages.important') }}:
                    @include('partials/important')
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h2>{{ Lang::get('messages.navigation') }}</h2>
                    @include('partials/menu')
                    <ul type="circle">
                        <li><a href="/auth/login">{{ Lang::get('messages.login') }}</a></li>
                    </ul>
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
