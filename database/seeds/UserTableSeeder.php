<?php

use Laracasts\TestDummy\Factory;

class UserTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index){
            Factory::create('User', [
                'password' => Hash::make('111111')
            ]);
        }
    }



}