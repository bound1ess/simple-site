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
     * @param CategoryList $list
     * @return void
     */
    public function addChildren(CategoryList $list)
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
     * @return boolean
     */
    public function hasNoChildren()
    {
        return count($this->children) < 1;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }
}
