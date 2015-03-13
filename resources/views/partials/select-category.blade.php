<div class="form-group">
    <label class="col-sm-2 control-label" for="category_id">
        {{ trans('messages.category') }}
    </label>

    <div class="col-sm-8">
        <select name="category_id" class="form-control">
        @foreach ($categories as $category)
            @if ( ! isset($post) or $post->category_id !== $category->id)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @else
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @endif
        @endforeach
        </select>
    </div>
</div>
