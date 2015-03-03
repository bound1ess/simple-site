<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @section('title')
                {{ Lang::get('messages.page-title') }}
            @stop
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css">
        @yield('css')
    </head>
    <body>
        <div class="container">
            @yield('body')
        </div>
        @yield('js')
    </body>
</html>
