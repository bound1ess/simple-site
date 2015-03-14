@extends('admin.dashboard')

@section('dashboard-body')
    @include('partials.error')

    <form method="post" action="/{{ Request::path() }}" class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">
                {{ trans('messages.category-name') }}
            </label>

            <div class="col-sm-8">
                <input name="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
        </div>

        @include('partials.select-category', [
            'categoryLabel' => trans('messages.parent-category'),
            'categoryName'  => 'parent_id',
        ])

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
