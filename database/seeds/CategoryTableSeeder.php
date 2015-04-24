<?php

use App\Models\Category;
use Laracasts\TestDummy\Factory;

class CategoryTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        $faker = \Faker\Factory::create();

        $rootElements = [
            ['name' => 'Accessories', 'children' => [
                ['name' => 'Baby Accessories', 'children' => [
                        ['name' => 'Baby Carriers & Wraps']
                    ]],
                ['name' => 'Belts & Suspenders', 'children' => [
                    ['name' => 'Belt Buckles'],
                    ['name' => 'Belts'],
                    ['name' => 'Suspenders'],
                ]],
                ['name' => 'Costume Accessories', 'children' => [
                    ['name' => 'Capes'],
                    ['name' => 'Costume Goggles'],
                    ['name' => 'Costume Hats & Headpieces'],
                    ['name' => 'Costume Tails & Ears', 'children' => [
                        ['name' => 'Costume Tails'],
                        ['name' => 'Costume Ears'],
                    ]],
                    ['name' => 'Costume Weapons'],
                    ['name' => 'Facial Hair'],
                    ['name' => 'Masks & Prosthetics', 'children' => [
                        ['name' => 'Masks'],
                        ['name' => 'Prosthetics'],
                    ]],
                    ['name' => 'Wands'],
                    ['name' => 'Wings'],
                ]],
                ['name' => 'Gloves & Mittens'],
                ['name' => 'Hair Accessories'],
                ['name' => 'Hats & Caps'],
                ['name' => 'Keychains & Lanyards'],
                ['name' => 'Patches & Pins'],
                ['name' => 'Scarves & Wraps'],
                ['name' => 'Suit & Tie Accessories'],
                ['name' => 'Sunglasses & Eyewear'],
                ['name' => 'Umbrellas & Rain Accessories']
            ]],
            ['name' => 'Art & Collectibles', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Bags & Purses', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Bath & Beauty', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Books, Movies & Music', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Clothing', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Craft Supplies & Tools', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Electronics & Accessories', 'children' => [
                ['name' => 'foo'],
                ['name' => 'bar'],
                ['name' => 'baz'],
                ['name' => 'foo & bar', 'children' => [
                    ['name' => 'bar'],
                    ['name' => 'baz'],
                ]]]],
            ['name' => 'Home & Living'],
            ['name' => 'Jewelry'],
            ['name' => 'Paper & Party Supplies'],
            ['name' => 'Pet Supplies'],
            ['name' => 'Toys & Games']
        ];

        Category::buildTree($rootElements);
    }
}