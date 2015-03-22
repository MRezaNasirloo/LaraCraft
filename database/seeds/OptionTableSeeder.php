<?php

use Laracasts\TestDummy\Factory;

class OptionTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {

        $faker = \Faker\Factory::create();

        foreach(range(1, 10) as $index){
            Factory::create('Option');
        }
    }



}