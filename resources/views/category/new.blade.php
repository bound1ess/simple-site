@extends('admin.dashboard')

@section('dashboard-body')
    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-lg btn-success">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop
