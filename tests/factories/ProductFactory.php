<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 1:42 AM
 */

$factory('App\Models\Product\Product', 'Product', [
    'shop_id'       =>  'factory:Shop',
    'name'          =>  $faker->word,
    'slug'          =>  $faker->slug,
    'photo_product' =>  $faker->imageUrl($width = rand(), $height = rand()),
    'description'   =>  $faker->paragraphs($nb = 3)
]);

$factory('App\Models\Product\Option', 'Option', [
    'by_admin'      => $faker->boolean(),
    'name'          => $faker->randomElement($array = array ('Color','Size','Shape', 'Material'))
]);

$factory('App\Models\Product\OptionValue', 'OptionValue', [
    'option_id'     => 'factory:Option',
    'by_admin'      => $faker->boolean(),
    'Value'         => $faker->randomElement($array = array ('Small','Medium','Large', 'XL', 'XXL', 'Red', 'Green', 'Black', 'Blue'))
]);

$factory('App\Models\Product\Variation', 'Variation', [
    'product_id'    => 'factory:Product',
    'price'         => $faker->numberBetween($min = 10, $max = 2000),
    'stock'         => $faker->randomDigitNotNull
]);

$factory('App\Models\Product\ProductOption', 'ProductOption', [
    'product_id'    => 'factory:Product',
    'option_id'    => 'factory:Option',
]);

$factory('App\Models\Product\ProductOptionValue', 'ProductOptionValue', [
    'product_option_id'    => 'factory:ProductOption',
    'value_id'    => 'factory:OptionValue',
]);

$factory('App\Models\Product\ProductOptionValue', 'ProductOptionValue', [
    'product_option_id'    => 'factory:ProductOption',
    'value_id'    => 'factory:OptionValue',
]);