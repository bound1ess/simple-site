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

        // This feature is insane, just look.
        $match = [];

        if (preg_match('/^@static\s(?P<file>.+)$/', $post->contents, $match)) {
            $post->contents = view('static.' . $match['file']);
        }

        return view('post', [
            'post' => $post,
            'categoryId' => $post->category_id,
        ]);
    }
}
