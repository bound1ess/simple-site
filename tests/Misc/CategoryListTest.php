<?php namespace Frostbite\Misc;

use Mockery;

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
        $this->list = new CategoryList(Mockery::mock('Frostbite\Category'));
    }

    /**
     * @test
     */
    public function it_does_its_job()
    {
        $this->list->addChildren(Mockery::mock('Frostbite\Misc\CategoryList'));

        expect($this->list->getRootCategory())->to_be_an('object');
        expect($this->list->getChildren())->to_have_length(1);
    }
}
