<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class ProductTest extends DBTestCase {

    /** @test */
    public function it_should_return_a_product_instance()
    {
        $product = Factory::create('App\Models\Product\Product');
        //var_dump($product->toArray());
        $this->assertEquals('App\Models\Product\Product',get_class($product));

    }

    /** @test */
    public function it_should_return_an_option_instance()
    {
        $option = Factory::create('App\Models\Product\Option');
//        var_dump($option->toArray());
        $this->assertEquals('App\Models\Product\Option',get_class($option));

    }

    /** @test */
    public function it_should_return_an_option_value_instance()
    {
        $optionValue = Factory::create('App\Models\Product\OptionValue');
//        var_dump($optionValue->toArray());
        $this->assertEquals('App\Models\Product\OptionValue',get_class($optionValue));

    }

    /** @test */
    public function it_should_return_a_variation_instance()
    {
        $variation = Factory::create('App\Models\Product\Variation');
        //var_dump($variation->toArray());
        $this->assertEquals('App\Models\Product\Variation',get_class($variation));

    }

}