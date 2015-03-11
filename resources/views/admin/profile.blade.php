@extends('admin.dashboard')

@section('dashboard-body')
    <!-- The error message. -->
    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">
                {{ trans('messages.email') }}*
            </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
            </div>
        </div>

        <div class="form-group">
            <label for="old_password" class="col-sm-2 control-label">
                {{ trans('messages.old-pswd') }}*
            </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="old_password">
            </div>
        </div>

        <div class="form-group">
            <label for="new_password" class="col-sm-2 control-label">
                {{ trans('messages.new-pswd') }}
            </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="new_password">
            </div>
        </div>

        <!-- The save button. -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-lg">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>

        <!-- The CSRF token. -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop
