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
