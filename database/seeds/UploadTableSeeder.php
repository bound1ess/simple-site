<?php

use Illuminate\Database\Seeder;

class UploadTableSeeder extends Seeder {

    /**
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Hello there',
                'path' => 'sample1.jpg',
            ],
            [
                'name' => 'Something',
                'path' => 'sample2.jpg',
            ],
            [
                'name' => 'How are you doing?',
                'path' => 'sample3.jpg',
            ],
        ];

        foreach ($data as $row) {
            Frostbite\Upload::create($row);
        }
    }
}
