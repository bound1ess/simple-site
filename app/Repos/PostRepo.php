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
     * @param integer $id
     * @return null|Post
     */
    public function get($id)
    {
        return $this->post->find($id);
    }

    /**
     * @return array
     */
    public function getImportantPosts()
    {
        return $this->post->where('is_important', true)->get();
    }
}
