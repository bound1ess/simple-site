<ul type="circle">
    @foreach ($categories as $category)
        <li>
            @if ( ! isset($categoryId) or $category->getRootCategory()->id != $categoryId)
                <a href="/category/{{ $category->getRootCategory()->id }}">
                    {{ $category->getRootCategory()->name }}
                </a>
            @else
                {{ $category->getRootCategory()->name }}
            @endif
        </li>
        @if (count($category->getChildren()) > 0)
            @include('partials/menu', ['categories' => $category->getChildren()])
        @endif
    @endforeach
</ul>
