<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

    /**
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Add a bunch of posts.
        for ($index = 0; $index < 100; $index++) {
            Frostbite\Post::create([
                'title' => $faker->sentence(),
                'contents' => $faker->paragraph(5),
                'is_important' => $faker->boolean(),
                'category_id' => 1, // @todo
            ]);
        }
    }
}
