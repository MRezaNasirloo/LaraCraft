<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 1:02 PM
 */

namespace Tests;


use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory;

class ShopTest extends DBTestCase {

    /** @test */
    public function it_should_be_a_shop_instance()
    {
        $shop = Factory::create($this->namespaceModels . '\Shop');
        //var_dump($product->toArray());
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));

    }

    /** @test */
    public function it_should_relate_to_an_instance_of_a_user()
    {
        $shop = Factory::create($this->namespaceModels . '\Shop');
        $user = $shop->user()->first();
        $this->assertEquals($this->namespaceModels . '\User', get_class($user));
    }

    /** @test */
    public function it_should_relate_to_an_instance_of_a_product()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $shop = $product->shop()->first();
        $products = $shop->products()->first();
        $this->assertEquals($this->namespaceProduct . '\Product', get_class($products));
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));

    }

    /** @test */
    public function it_should_be_an_instance_of_a_shop()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $shop = $product->shop()->first();
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));
        $this->assertInstanceOf($this->namespaceModels . '\Shop', $shop);

    }


}