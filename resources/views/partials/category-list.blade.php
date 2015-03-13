<ul type="circle">
    @foreach ($categories as $category)
        <li>
            <a href="/category/{{ $category->getRootCategory()->id }}">
                {{ $category->getRootCategory()->name }}
            </a>
            [<a href="/categories/{{ $category->getRootCategory()->id }}/edit">{{ trans('messages.edit') }}</a>]
        </li>

        @if ( ! $category->hasNoChildren())
            @include('partials.category-list', ['categories' => $category->getChildren()])
        @endif
    @endforeach
</ul>
