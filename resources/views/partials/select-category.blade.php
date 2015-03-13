<div class="form-group">
    <label class="col-sm-2 control-label" for="category_id">
        {{ trans('messages.category') }}
    </label>

    <div class="col-sm-8">
        <select name="category_id" class="form-control">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
    </div>
</div>
