@extends('admin.dashboard')

@section('dashboard-body')
    <h3>{{ trans('messages.upload') }}</h3>
    <!-- Dropzone here? -->
    <ul>
        @foreach ($uploads as $upload)
            <li>
                <a href="/uploads/{{ urlencode($upload->path) }}" target="_blank">
                    {{ $upload->name }}
                </a>

                <a href="/admin/upload/hide?id={{ $upload->id }}">
                    ({{ trans('upload.hide') }})
                </a>
            </li>
        @endforeach
    </ul>
@stop
