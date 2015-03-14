<link rel="stylesheet" href="/css/medium-editor.min.css">
<link rel="stylesheet" href="/css/themes/default.min.css">

<script src="/js/medium-editor.min.js"></script>

<script>
    window.onload = function() {
        var editor = new MediumEditor('.editor', {
            placeholder: "{{ $placeholder ?: trans('messages.placeholder') }}",
            buttons: ['image'],
        });
    };
</script>

<style>
    .editor {
        background-color: white;
        color: black;
        padding: 10px;
    }
</style>
