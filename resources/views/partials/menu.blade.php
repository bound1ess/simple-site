<ul>
    @foreach ($categories as $category)
    <li>
        <a href="/post/{{ $category->getRootCategory()->id }}">
            {{ $category->getRootCategory()->name }}
        </a>
    </li>
    <li>
        @include('partials/menu', ['categories' => $category->getChildren()])
    </li>
    @endforeach
</ul>
