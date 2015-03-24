<?php

use App\Models\Shop;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory;

class ProductTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();

        $shopIds = Shop::lists('id');

        foreach(range(1, 500) as $index){

            Factory::create('Product', [
                'shop_id' => $faker->randomElement($shopIds),
                'photo_product' => $faker->imageUrl($width = 200, $height = 200, $faker->randomElement(['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport'])),
            ]);
        }
    }



}