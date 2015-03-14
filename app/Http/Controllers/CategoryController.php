<?php namespace Frostbite\Http\Controllers;

use Frostbite\Repos\CategoryRepo, Frostbite\Validators\CategoryValidator;
use Request;

class CategoryController extends Controller {

    /**
     * @var CategoryRepo
     */
    protected $repo;

    /**
     * @param CategoryRepo $repo
     * @return CategoryController
     */
    public function __construct(CategoryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (is_null($category = $this->repo->get($id))) {
            abort(404);
        }

        return view('category-list', [
            'posts' => $category->posts,
            'childCategories' => $category->childCategories(),
            'categoryId' => $id,
        ]);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (is_null($category = $this->repo->get($id))) {
            abort(404);
        }

        return view('category.edit')
            ->withCategory($category)
            ->with('categoryId', $category->parent_id);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function saveChanges($id)
    {
        $input = Request::only('name', 'parent_id');

        if ( ! with(new CategoryValidator)->validate($input)) {
            return redirect()
                ->back()
                ->withInput()
                ->withMessage(trans('errors.category'));
        }

        if (is_null($category = $this->repo->get($id))) {
            abort(404);
        }

        $category->name      = $input['name'];
        $category->parent_id = $input['parent_id'];

        $category->save();

        return redirect()->to('category/' . $category->id);
    }

    /**
     * @return Response
     */
    public function create()
    {
        return view('category.new');
    }

    /**
     * @return Response
     */
    public function store()
    {
        $input = Request::only('name', 'parent_id');

        if ( ! with(new CategoryValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.category'));
        }

        return redirect()->to('category/' . $this->repo->create($input));
    }
}
