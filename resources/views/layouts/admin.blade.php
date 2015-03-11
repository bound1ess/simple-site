<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ Config::get('main-page.name') }}</title>
        <style>
            body {
                padding-top: 80px;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.2/slate/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/admin/dashboard">
                        {{ Config::get('main-page.name') }}
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">{{ trans('messages.back-to-site') }}</a></li>

                    @if (Request::path() == 'admin/profile')
                        <li class="active"><a href="#">{{ trans('messages.profile') }}</a></li>
                    @else
                        <li><a href="/admin/profile">{{ trans('messages.profile') }}</a></li>
                    @endif

                    <li><a href="/admin/logout">{{ trans('messages.logout') }}</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('body')
        </div>
    </body>
</html>
