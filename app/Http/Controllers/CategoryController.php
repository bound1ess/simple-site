<?php namespace Frostbite\Http\Controllers;

use Frostbite\Repos\CategoryRepo;
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
     * @return Response
     */
    public function edit($id)
    {
        dd((int) $id);
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

        dd($input);
    }
}
