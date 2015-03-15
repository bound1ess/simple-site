@extends('admin.dashboard')

@section('dashboard-body')
    @include('partials.error')

    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">
                {{ trans('messages.title') }}
            </label>

            <div class="col-sm-8">
                <input type="text" value="{{ old('title') }}"
                    class="form-control" name="title">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="contents">
                {{ trans('messages.contents') }}
            </label>

            <div class="col-sm-8">
                <textarea name="contents" class="hidden"></textarea>
                <div class="editor lead">{!! old('contents') !!}</div>
            </div>
        </div>

        @include('partials.select-category')

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_important"
                            {{ old('is_important') ? ' checked' : '' }}>
                        {{ trans('messages.important') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-lg btn-success" type="submit">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    @include('partials.editor')
@stop
