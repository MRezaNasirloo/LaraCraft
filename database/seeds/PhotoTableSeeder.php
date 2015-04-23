<?php

use App\Models\Photo;
use App\Models\Product\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory;

class PhotoTableSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();

        $productIds = Product::lists('id');

        foreach(range(1, 100) as $index){

            $productId = $faker->randomElement($productIds);

            $productIds = array_diff($productIds, [$productId]);

            Photo::create([
                'imageable_type' => 'App\Models\Product\Product',
                'imageable_id'   => $productId,
                'untouched'      => $faker->imageUrl($width = 400, $height = 400, $faker->randomElement(['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport'])),
                'medium'         => $faker->imageUrl($width = 200, $height = 200, $faker->randomElement(['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport'])),
                'thumb'          => $faker->imageUrl($width = 150, $height = 150, $faker->randomElement(['abstract','animals','business','cats','city','food','nightlife','fashion','people','nature','sports','technics','transport'])),
            ]);
        }
    }



}