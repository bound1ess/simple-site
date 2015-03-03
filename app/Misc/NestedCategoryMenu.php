<?php namespace Frostbite\Misc;

use Frostbite\Category;

class NestedCategoryMenu {

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var array
     */
    protected $menus = [];

    /**
     * @param Category $category
     * @return void
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param NestedCategoryMenu $menu
     * @return void
     */
    public function addMenu(NestedCategoryMenu $menu)
    {
        $this->menus[] = $menu;
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
    public function getMenus()
    {
        return $this->menus;
    }
}
