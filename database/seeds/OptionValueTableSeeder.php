<?php

use Laracasts\TestDummy\Factory;

class OptionValueTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {

        $faker = \Faker\Factory::create();
        $optionIds = \App\Models\Product\Option::lists('id');

        foreach(range(1, 25) as $index){
            Factory::create('OptionValue', [
                'option_id' => $faker->randomElement($optionIds)
            ]);
        }
    }



}