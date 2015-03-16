<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-02-28
 * Time: 5:43 PM
 */

$factory('App\Models\User', 'User', [
    'name'      => $faker->name,
    'email'     => $faker->freeEmail,
    'password'  => $faker->word
]);


$factory('App\Models\Shop', 'Shop', [
    'name'          => $faker->word,
    'user_id'       => 'factory:User',
    'slug'          => $faker->slug,
    'image_banner'  => $faker->imageUrl($width = 640, $height = 480),
    'description'   => $faker->sentence
]);