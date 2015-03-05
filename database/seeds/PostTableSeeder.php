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
                'contents' => $faker->boolean() ? $faker->paragraph(5) : '@static bills',
                'is_important' => $faker->boolean(2),
                'category_id' => rand(1, 4),
            ]);
        }
    }
}
