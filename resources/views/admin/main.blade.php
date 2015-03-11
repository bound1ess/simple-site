@extends('admin.dashboard')

@section('dashboard-body')
    @if (Session::has('message'))
        <div class="alert alert-danger">
            {{ Session::get('message') }}
        </div>
    @endif

    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">
                {{ trans('messages.name') }}
            </label>

            <div class="col-sm-8">
                <input type="text" class="form-control" name="name"
                    value="{{ old('name') ?: trans('messages.project-name') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="desc" class="col-sm-2 control-label">
                {{ trans('messages.desc') }}
            </label>

            <div class="col-sm-8">
                <input type="text" class="form-control" name="desc"
                    value="{{ old('desc') ?: trans('messages.project-desc') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button class="btn btn-success btn-lg" type="submit">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop
