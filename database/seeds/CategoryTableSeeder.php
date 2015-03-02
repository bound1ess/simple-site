<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

    /**
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Add a bunch of categories.
        for ($index = 1; $index <= 30; $index++) {
            if ($faker->boolean(33)) {
                // No parent directory.
                Frostbite\Category::create([
                    'name' => $faker->sentence(),
                    'parent_id' => null,
                ]);
            } else {
                do {
                    $parentId = rand(1, $index);
                } while ($index !== 1 and $parentId == $index);

                Frostbite\Category::create([
                    'name' => $faker->sentence(),
                    'parent_id' => $parentId,
                ]);
            }
        }
    }
}
