{!! implode(', ', array_map(function($post) {
    return sprintf('<a href="/post/%s">%s</a>', $post->id, $post->title);
}, array_slice($importantPosts->all(), 0, 3))) !!}
