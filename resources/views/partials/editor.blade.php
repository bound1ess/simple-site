<link rel="stylesheet" href="/css/medium-editor.min.css">
<link rel="stylesheet" href="/css/themes/default.min.css">

<script src="/js/medium-editor.min.js"></script>

<script>
    window.onload = function() {
        var editor = new MediumEditor('.editor', {
            placeholder: "{{ trans('messages.placeholder') }}",
            buttons: [
                'anchor',
                'image',
                'bold',
                'italic',
                'underline',
                'unorderedlist',
                'orderedlist',
                'justifyLeft',
                'justifyRight',
            ],
            targetBlank: true,
            anchorInputPlaceholder: "{{ trans('messages.anchor-placeholder') }}",
        });

        document.getElementsByTagName('form')[0].onsubmit = function(event) {
            var textarea = this.getElementsByTagName('textarea')[0];

            textarea.innerHTML = this.getElementsByClassName('editor')[0].innerHTML;
        };
    };
</script>

<style>
    .editor {
        background-color: white;
        color: black;
        padding: 10px;
    }

    .editor a {
        color: black;
    }
</style>
