<?php namespace App\Models\Product;


use Illuminate\Support\Collection;

interface IGenerator {

    /**
     * Generate all possible variation from Product using its Options and OptionValues.
     *
     * @param IProduct $product
     * @return Collection of Variation
     */
    static public function generate(IProduct $product);

}