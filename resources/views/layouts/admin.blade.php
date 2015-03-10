<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ trans('messages.project-name') }}</title>
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
                    <a class="navbar-brand" href="/">{{ trans('messages.project-name') }}</a>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('body')
        </div>
    </body>
</html>
