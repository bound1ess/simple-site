<?php namespace Frostbite\Repos;

use Frostbite\Post;

class PostRepo {

    /**
     * @var Post
     */
    protected $post;

    /**
     * @param Post|null $post
     * @return PostRepo
     */
    public function __construct(Post $post = null)
    {
        $this->post = $post ?: new Post;
    }

    /**
     * @param array $input
     * @return int
     */
    public function create(array $input)
    {
        return $this->post->create($input)->id;
    }

    /**
     * @param integer $id
     * @return null|Post
     */
    public function get($id)
    {
        return $this->post->find($id);
    }

    /**
     * @return Illuminate\Support\Collection
     */
    public function getImportantPosts()
    {
        return $this->post->where('is_important', true)->get();
    }

    /**
     * @return Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->post->get()->sortBy(function(Post $post) {
            return -1 * $post->id;
        });
    }
}
