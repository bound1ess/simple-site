@extends('admin.dashboard')

@section('dashboard-body')
    <link rel="stylesheet" href="/dropzone/dropzone.min.css">
    <!--<link rel="stylesheet" href="/dropzone/basic.min.css">-->

    <h3>{{ trans('messages.upload') }}</h3>

    <form class="dropzone" id="dropzone">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>

    <hr>
    <ul id="uploads">
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
    <script src="/dropzone/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            $(document).on('click', '.hide-upload', function() {
                return confirm('{{ trans('upload.confirm-hide') }}');
            });

            $('#dropzone').dropzone({
                url: '/admin/upload/save',
                paramName: 'file',
                maxFilesize: 5,
                method: 'post',
                uploadMultiple: false,
                addRemoveLinks: false,
                createImageThumbnails: false,
                maxFiles: 3,
                acceptedFiles: 'image/jpeg',
                autoProcessQueue: true,
                sending: function(file, xhr, formData) {
                    formData.append('_token', $('[name=_token]').val());
                },
                success: function(file, response) {
                    var fileLink = $('<a>')
                        .html(file.name)
                        .attr('href', '/uploads/' + response.name)
                        .attr('target', '_blank');

                    var removeLink = $('<a>')
                        .html('({{ trans('upload.hide') }})')
                        .addClass('hide-upload')
                        .attr('href', '/admin/upload/hide?id=' + response.id);

                    $('#uploads').prepend(
                        $('<li>').append(fileLink).append(' ').append(removeLink)
                    );
                },
                // correct wording here
            });
        });
    </script>
@stop
