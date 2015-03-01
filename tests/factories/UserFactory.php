<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-02-28
 * Time: 5:43 PM
 */

$factory('App\Models\User', [
    'name'      => $faker->name,
    'email'     => $faker->email,
    'password'  => $faker->word
]);


$factory('App\Models\Shop', [
    'name'          => $faker->word,
    'user_id'       => 'factory:App\Models\User',
    'slug'          => $faker->word,
    'image_banner'  => $faker->word,
    'description'   => $faker->sentence
]);