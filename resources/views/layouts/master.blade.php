<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Lang::get('messages.page-title') }}
            @stop
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.2/united/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 80px;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="container">
            @yield('body')
        </div>
        @yield('js')
    </body>
</html>
