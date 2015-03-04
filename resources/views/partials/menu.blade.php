<ul type="circle">
    @foreach ($categories as $category)
        <li>
            <a href="/category/{{ $category->getRootCategory()->id }}">
                {{ $category->getRootCategory()->name }}
            </a>
        </li>
        @if (count($category->getChildren()) > 0)
            @include('partials/menu', ['categories' => $category->getChildren()])
        @endif
    @endforeach
</ul>
