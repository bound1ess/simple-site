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

                <a class="hide-upload" href="/admin/upload/hide?id={{ $upload->id }}">
                    ({{ trans('upload.hide') }})
                </a>
            </li>
        @endforeach
    </ul>

    <script src="/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.hide-upload').click(function() {
                return confirm('{{ trans('upload.confirm-hide') }}');
            });
        });
    </script>
@stop
