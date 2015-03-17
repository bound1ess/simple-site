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
     * @param array $input
     * @return int
     */
    public function create(array $input)
    {
        return $this->category->create($input)->id;
    }

    /**
     * @return Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->category->get();
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function get($id)
    {
        return $this->category->find($id);
    }

    /**
     * @return array
     */
    public function buildList()
    {
        $categories = $this->category->all()->all(); // array
        $list = [];

        // This filter selects ONLY those nodes that have no parent node.
        $topFilter = function(Category $category) {
            return is_null($category->parent_id);
        };

        $childFilter = function(Category $category) use($topFilter) {
            return ! $topFilter($category);
        };

        $topNodes   = array_filter($categories, $topFilter);
        $childNodes = array_filter($categories, $childFilter);

        foreach ($topNodes as $category) {
            $list[] = $this->doBuild($category, $childNodes);
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
