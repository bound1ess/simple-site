<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * @return void
     */
    public function run()
    {
        Frostbite\User::create([
            'name' => 'John Doe',
            'email' => 'example@example.com',
            'password' => Hash::make('example-password'),
        ]);
    }
}
