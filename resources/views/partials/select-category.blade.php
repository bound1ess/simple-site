<div class="form-group">
    <label class="col-sm-2 control-label" for="category_id">
        {{ isset($categoryLabel) ? $categoryLabel : trans('messages.category') }}
    </label>

    <div class="col-sm-8">
        <select name="{{ isset($categoryName) ? $categoryName : 'category_id' }}"
            class="form-control">
        @foreach ($categories as $category)
            @if ( ! isset($categoryId) or $categoryId != $category->id)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @else
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @endif
        @endforeach
        </select>
    </div>
</div>
