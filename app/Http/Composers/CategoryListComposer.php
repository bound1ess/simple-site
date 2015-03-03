<?php namespace Frostbite\Http\Composers;

use Illuminate\Contracts\View\View;

use Frostbite\Repos\CategoryRepo,
    Frostbite\Category;

class CategoryListComposer {

    /**
     * @var CategoryRepo
     */
    protected $categoryRepo;

    /**
     * @param CategoryRepo $repo
     * @return CategoryListComposer
     */
    public function __construct(CategoryRepo $repo)
    {
        $this->categoryRepo = $repo;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categoryRepo->buildList());
    }
}
