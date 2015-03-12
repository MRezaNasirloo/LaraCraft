<?php namespace Tests;

use App\Models\Product\Option;

use Laracasts\TestDummy\Factory;

class ProductTest extends DBTestCase {

    /** @test */
    public function it_should_belongs_to_a_shop()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $shop = $product->shop()->first();
        $this->assertNotEmpty($shop);
        $this->assertInstanceOf($this->namespaceModels . '\Shop', $shop);
    }

    /** @test */
    public function its_adds_option_method_adds_an_option()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $option = Factory::create($this->namespaceProduct . '\Option');

        $product->addOption($option);

        $option = Option::find($option->id);

        $this->assertNotEmpty($option);
        $this->assertInstanceOf($this->namespaceProduct . '\IOption', $option);
    }

    /** @test */
    public function its_add_options_method_adds_an_array_of_options()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $options = Factory::times(3)->create($this->namespaceProduct . '\Option');

        $arrayOfOptions = $this->collectionToArray($options);
        $product->addOptions($arrayOfOptions);

        $options = Option::all();
        $this->assertNotEmpty($options);
        $options = $this->collectionToArray($options);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOption', $options);
    }

    /** @test */
    public function it_can_get_all_of_its_options()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $options = Factory::times(3)->create($this->namespaceProduct . '\Option');

        $arrayOfOptions = $this->collectionToArray($options);
        $product->addOptions($arrayOfOptions);

        $options = $product->options()->get();
        $options = $this->collectionToArray($options);

        $this->assertNotEmpty($options);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOption', $options);
    }

    /** @test */
    public function it_can_retrieve_all_of_its_variation()
    {
        $product = Factory::create($this->namespaceProduct . '\Product');
        $variation = $product->variations()->get();
        $this->assertEmpty($variation);

        $variation = Factory::create($this->namespaceProduct . '\Variation');

        $product->addVariation($variation);

        $variation = $product->variations()->first();

        $this->assertEquals($product->id, $variation->product_id);
    }

}