<?php namespace App\Models;


use App\Models\Product\IProduct;

interface IShop {

    /**
     * Associate a Product to this Shop
     *
     * @param IProduct $product
     * @return mixed
     */
    public function addProduct(IProduct $product);

}