<ul type="circle">
    @foreach ($categories as $category)
        <li>
            <a href="/category/{{ $category->getRootCategory()->id }}">
                {{ $category->getRootCategory()->name }}
            </a>
        </li>

        @if ( ! $category->hasNoChildren())
            @include('partials.category-list', ['categories' => $category->getChildren()])
        @endif
    @endforeach
</ul>
