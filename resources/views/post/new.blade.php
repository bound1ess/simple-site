@extends('admin.dashboard')

@section('dashboard-body')
    <form method="post" action="/{{ Request::path() }}">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-lg btn-success" type="submit">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop
