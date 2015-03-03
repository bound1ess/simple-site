<?php namespace Frostbite\Repos;

use Frostbite\Category,
    Frostbite\Misc\CategoryList;

class CategoryRepo {

    /**
     * @var Category
     */
    protected $category;

    /**
     * @param Category|null $category
     * @return CategoryRepo
     */
    public function __construct(Category $category = null)
    {
        $this->category = $category ?: new Category;
    }

    /**
     * @return array
     */
    public function buildList()
    {
        $categories = $this->category->all()->all(); // array
        $list = [];

        // This filter selects ONLY those nodes that have no parent node.
        $filter = function(Category $category) {
            return is_null($pId = $category->parent_id) or $pId == $category->id;
        };

        foreach (array_filter($categories, $filter) as $category) {
            $list[] = $this->doBuild($category, $categories);
        }

        return $list;
    }

    /**
     * @param Category $category
     * @param array $categories
     * @return CategoryList
     */
    protected function doBuild(Category $category, array $categories)
    {
        $list = new CategoryList($category);

        // This filter selects child nodes.
        $filter = function(Category $someCategory) use($category) {
            return $someCategory->parent_id == $category->id;
        };

        // The recursive approach.
        foreach (array_filter($categories, $filter) as $category) {
            $list->addChildren($this->doBuild($category, $categories));
        }

        return $list;
    }
}
