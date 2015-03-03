<?php namespace Frostbite\Misc;

class CategoryListTest extends \TestCase {

    /**
     * @var CategoryList
     */
    protected $list;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->list = new CategoryList($this->mockCategory());
    }

    /**
     * @test
     */
    public function it_does_its_job()
    {
        $this->list->addCategory($this->mockCategory());
        $this->list->addCategoryList(\Mockery::mock('Frostbite\Misc\CategoryList'));

        expect($this->list->getRootCategory())->to_be_ok;
        expect($this->list->getCategories())->to_have_length(1);
        expect($this->list->getChildren())->to_have_length(1);
    }

    /**
     * @return object
     */
    protected function mockCategory()
    {
        return \Mockery::mock('Frostbite\Category');
    }

}
