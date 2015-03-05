{!! implode(', ', array_map(function($post) {
    return sprintf('<a href="/post/%s">%s</a>', $post->id, $post->title);
}, $importantPosts->all())) !!}
