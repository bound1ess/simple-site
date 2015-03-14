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

        return view('post.edit')
            ->withPost($post)
            ->with('categoryId', $post->category_id);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function saveChanges($id)
    {
        $input = Request::only('title', 'contents', 'is_important', 'category_id');

        $input['id']           = $id;
        $input['is_important'] = $input['is_important'] === 'on';

        if ( ! with(new PostValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.post'));
        }

        $post = $this->repo->get($id);

        $post->title        = $input['title'];
        $post->contents     = $input['contents'];
        $post->is_important = $input['is_important'];
        $post->category_id  = $input['category_id'];

        $post->save();

        return redirect()->to('post/' . $id);
    }

    /**
     * @return Response
     */
    public function create()
    {
        if ( ! Request::has('category_id')) {
            $categoryId = 1;
        } else {
            $categoryId = intval(Request::get('category_id'));
        }

        return view('post.new')->with('categoryId', $categoryId);
    }

    /**
     * @return Response
     */
    public function store()
    {
        $input = Request::only('title', 'contents', 'category_id', 'is_important');

        $input['is_important'] = $input['is_important'] === 'on';

        if ( ! with(new PostValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.post'));
        }

        $postId = $this->repo->create($input);

        return redirect()->to('post/' . $postId);
    }
}
