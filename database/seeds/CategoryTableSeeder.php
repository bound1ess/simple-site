<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

    /**
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "Foo",
                "parent_id" => null,
            ],
            [
                "name" => "Bar",
                "parent_id" => 1,
            ],
            [
                "name" => "Baz",
                "parent_id" => 1,
            ],
            [
                "name" => "Fizz",
                "parent_id" => 3,
            ],
        ];

        foreach ($categories as $category) {
            Frostbite\Category::create($category);
        }
    }
}
