<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class ExampleTest extends DBTestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/auth/login');

		$this->assertEquals(200, $response->getStatusCode());
	}

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomeController()
    {
        $user = Factory::create($this->namespaceModels . '\User');
        $this->be($user);
        $response = $this->call('GET', '/home');
        //var_dump($user->toArray());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function it_should_return_a_product_instance()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        //var_dump($product->toArray());
        $this->assertEquals($this->namespaceProduct . '\Product',get_class($product));

    }

    /** @test */
    public function it_should_return_an_option_instance()
    {
        $option = Factory::create($this->namespaceProduct . '\Option');
//        var_dump($option->toArray());
        $this->assertEquals($this->namespaceProduct . '\Option',get_class($option));

    }

    /** @test */
    public function it_should_return_an_option_value_instance()
    {
        $optionValue = Factory::create($this->namespaceProduct . '\OptionValue');
//        var_dump($optionValue->toArray());
        $this->assertEquals($this->namespaceProduct . '\OptionValue',get_class($optionValue));

    }

    /** @test */
    public function it_should_return_a_variation_instance()
    {
        $variation = Factory::create($this->namespaceProduct . '\Variation');
        //var_dump($variation->toArray());
        $this->assertEquals($this->namespaceProduct . '\Variation',get_class($variation));

    }


}
