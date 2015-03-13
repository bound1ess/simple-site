<?php namespace Frostbite\Http\Controllers;

use Frostbite\Repos\PostRepo, Frostbite\Validators\PostValidator;
use Request;

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
     * @param int $id
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

    /**
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (is_null($post = $this->repo->get($id))) {
            abort(404);
        }

        return view('post.edit')->withPost($post);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function saveChanges($id)
    {
        $input = Request::only('title', 'contents', 'is_important');

        $input['id'] = $id;
        $input['is_important'] = $input['is_important'] === 'on';

        if ( ! with(new PostValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.post'));
        }

        // ...
    }
}
