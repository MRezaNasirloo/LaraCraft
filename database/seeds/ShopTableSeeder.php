<?php

use App\Models\User;
use Faker\Factory as Facker;
use Laracasts\TestDummy\Factory;

class ShopTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {

        $faker = Facker::create();

        $userIds = User::lists('id');

        foreach(range(1, 50) as $index){

            $userId = $faker->randomElement($userIds);

            $userIds = array_diff($userIds, [$userId]);

            Factory::create('Shop', [
                'user_id' => $userId,
                'image_banner' => $faker->imageUrl($width = 600, $height = 200, $faker->randomElement(['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport']))
            ]);
        }
    }



}