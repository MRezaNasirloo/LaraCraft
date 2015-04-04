<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 5:12 PM
 */

$factory('App\Models\Shop', 'Shop', [
    'name'          => $faker->word,
    'user_id'       => 'factory:User',
    'slug'          => $faker->slug,
    'image_banner'  => $faker->imageUrl($width = 600, $height = 200),
    'description'   => $faker->sentence
]);
