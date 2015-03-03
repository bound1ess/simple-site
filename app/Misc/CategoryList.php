<?php namespace Frostbite\Misc;

use Frostbite\Category;

class CategoryList {

    /**
     * @var Category
     */
    protected $rootCategory;

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var array
     */
    protected $children = [];

    /**
     * @param Category $rootCategory
     * @return CategoryList
     */
    public function __construct(Category $rootCategory)
    {
        $this->rootCategory = $rootCategory;
    }

    /**
     * @param Category $category
     * @return void
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param CategoryList $list
     * @return void
     */
    public function addCategoryList(CategoryList $list)
    {
        $this->children[] = $list;
    }

    /**
     * @return Category
     */
    public function getRootCategory()
    {
        return $this->rootCategory;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }
}
