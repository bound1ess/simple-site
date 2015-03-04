<?php namespace Frostbite\Http\Controllers;

use Frostbite\Repos\CategoryRepo;

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

        return view('category-list', ['categories' => $category->posts()]);
    }
}