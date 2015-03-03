<?php namespace Frostbite\Repos;

use Frostbite\Category;
use Frostbite\Misc\NestedCategoryMenu;

class CategoryRepo {

    /**
     * @var Category
     */
    protected $category;

    /**
     * @param Category $category
     * @return CategoryRepo
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return NestedCategoryMenu
     */
    public function buildTree()
    {
        $categories = $this->category->all()->toArray();

        // ...
    }
}
