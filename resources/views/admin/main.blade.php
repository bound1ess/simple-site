@extends('admin.dashboard')

@section('dashboard-body')
    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">
                {{ trans('messages.name') }}
            </label>

            <div class="col-sm-8">
                <input type="text" class="form-control"
                    value="{{ old('name') ?: trans('messages.project-name') }}">
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
