<ul class="list-unstyled">
    @foreach ($categories as $category)
    <li>
        <a href="/post/{{ $category->getRootCategory()->id }}">
            {{ $category->getRootCategory()->name }}
        </a>
    </li>
    @endforeach
</ul>
