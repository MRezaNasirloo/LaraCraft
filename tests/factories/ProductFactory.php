<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 1:42 AM
 */

$factory('App\Models\Product\Product', 'Product', [
    'shop_id'       =>  'factory:App\Models\Shop',
    'name'          =>  $faker->word,
    'slug'          =>  $faker->slug,
    'photo_product' =>  $faker->imageUrl($width = rand(), $height = rand()),
    'description'   =>  $faker->paragraphs($nb = 3)
]);

$factory('App\Models\Product\Option', 'Option', [
    'product_id'    => 'factory:App\Models\Product\Product',
    'name'          => $faker->randomElement($array = array ('Color','Size','Shape', 'Material')),
]);

$factory('App\Models\Product\OptionValue', 'OptionValue', [
    'option_id'     => 'factory:App\Models\Product\Option',
    'Value'         => $faker->randomElement($array = array ('Small','Medium','Large', 'XL', 'XXL', 'Red', 'Green', 'Black', 'Blue'))
]);

$factory('App\Models\Product\Variation', 'Variation', [
    'product_id'    => 'factory:App\Models\Product\Product',
    'name'          => $faker->word,
    'price'         => $faker->numberBetween($min = 10, $max = 2000),
    'stock'         => $faker->randomDigitNotNull
]);