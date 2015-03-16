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
    'image_banner'  => $faker->imageUrl($width = 640, $height = 480),
    'description'   => $faker->sentence
]);

$factory('App\Models\User', 'User', [
    'name'      => $faker->name,
    'email'     => $faker->freeEmail,
    'password'  => $faker->word
]);

$factory('App\Models\Product\Product', 'Product', [
    'shop_id'       =>  'factory:Shop',
    'name'          =>  $faker->word,
    'slug'          =>  $faker->slug,
    'photo_product' =>  $faker->imageUrl($width = rand(), $height = rand()),
    'description'   =>  $faker->paragraphs($nb = 3)
]);