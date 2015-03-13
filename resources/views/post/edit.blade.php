@extends('admin.dashboard')

@section('dashboard-body')
    @if (Session::has('message'))
        <div class="alert alert-danger">
            {{ Session::get('message') }}
        </div>
    @endif

    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">
                {{ trans('messages.title') }}
            </label>

            <div class="col-sm-8">
                <input type="text" value="{{ old('title') ?: $post->title }}"
                    class="form-control" name="title">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="contents">
                {{ trans('messages.contents') }}
            </label>

            <div class="col-sm-8">
                <textarea name="contents"
                    class="form-control" rows="15">{{ old('contents') ?: $post->contents }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_important"
                            {{(old('is_important') ?: $post->is_important) ? ' checked':''}}>
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
@stop
