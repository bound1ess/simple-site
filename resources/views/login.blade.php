<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Lang::get('messages.login') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <form class="form-signin" action="/auth/login" method="post">
        <h2 class="form-signin-heading">{{ Lang::get('messages.login') }}</h2>

        @if (Session::has('error_message'))
            <p class="lead">{{ Session::get('error_message') }}</p>
        @endif

        <label for="inputEmail" class="sr-only">{{ Lang::get('messages.email') }}</label>
        <input type="email" name="email" class="form-control" placeholder="{{ trans('messages.email') }}" value="{{ old('email') }}" required autofocus>

        <label for="inputPassword" class="sr-only">{{ Lang::get('messages.pswd') }}</label>
        <input type="password" name="password" class="form-control" placeholder="{{ trans('messages.pswd') }}" value="{{ old('password') }}" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">
            {{ Lang::get('messages.login') }}
        </button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>

    </div> <!-- /container -->

  </body>
</html>
