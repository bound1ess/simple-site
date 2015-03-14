@if (Session::has('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
    </div>
@endif
