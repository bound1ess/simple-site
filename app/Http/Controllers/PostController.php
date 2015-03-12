<?php namespace Frostbite\Http\Controllers;

use Frostbite\Repos\PostRepo;

class PostController extends Controller {

    /**
     * @var PostRepo
     */
    protected $repo;

    /**
     * @param PostRepo $repo
     * @return PostController
     */
    public function __construct(PostRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param integer $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (is_null($post = $this->repo->get($id))) {
            abort(404);
        }

        return view('post', [
            'post' => $post,
            'categoryId' => $post->category_id,
        ]);
    }
}
