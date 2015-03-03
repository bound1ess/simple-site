<?php namespace Frostbite\Repos;

class CategoryRepoTest extends \TestCase {

    /**
     * @test
     */
    public function it_builds_nested_list()
    {
        $repo = new CategoryRepo($category = \Mockery::mock('Frostbite\Category'));
        $category->shouldReceive('all')->twice()->andReturn($category, []);

        expect($repo->buildList())->to_be_an('array');
    }
}
